<?php

namespace App\Entities;

use App\Models\User;
use App\Repositories\Contracts\AuctionRepository;
use Database\Factories\AuctionFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Auction.
 * @property int $id
 * @package namespace App\Entities;
 */
class Auction extends Model implements Transformable
{
    use TransformableTrait, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','start_price','biding_type','bidding_price',"current_price",'start_at','end_at','vendor_id','status',"winner_id",'category_id'];

    protected $dates = ['end_at','start_at'];

    protected $appends = ["previewed_price"];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id');
    }

    protected static function newFactory()
    {
        return app(AuctionFactory::class)->new();
    }


    public function biddings()
    {
        return $this->hasMany(Bidding::class);
    }

    public function maxBid()
    {
        return $this->hasOne(Bidding::class)->ofMany("amount_price");
    }

    public function minBid()
    {
        return $this->hasOne(Bidding::class)->ofMany("amount_price","MIN");
    }

    public function lastBiding()
    {
        return $this->hasOne(Bidding::class)->latestOfMany();
    }

    public function bidders()
    {
        return $this->belongsToMany(User::class,'biddings',"auction_id",'client_id')->select("users.*")->distinct();
    }

    public function involvedBiders()
    {
        return $this->belongsToMany(User::class,'biddings','auction_id','client_id')->groupBy("users.id");
    }

    public function lastBidding()
    {
        return $this->hasOne(Bidding::class)->latestOfMany();
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function winner()
    {
        return $this->belongsTo(User::class,"winner_id");
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class,'auction_id');
    }

    public function notAnsweredQuestions()
    {
        return $this->questions()->whereNull("answer");
    }

    public function answeredQuestions()
    {
        return $this->questions()->whereNotNull("answer");
    }

    public function scopeStatus($query,$status)
    {
        return $query->where('status',$status);
    }

    public function scopeShouldBeAssignToWinner(Builder $builder)
    {
        return $builder
            ->doesntHave("winner")
            ->whereDate("end_at",'<=',now())
            ->whereTime('end_at','<=',now())
            ->has("lastBidding");
    }

    public function scopePast(Builder $builder)
    {
        return $builder
            ->where("end_at","<=", today()->format("Y-m-d H:i"));
    }

    public function scopeRunning(Builder $builder,int $limit = 3)
    {
        return $builder
            ->doesntHave("winner")
            ->where("start_at","<=", today()->format("Y-m-d H:i"))
            ->where("end_at",">", today()->format("Y-m-d H:i"))
            ->limit($limit);
    }

    public function scopePopular(Builder $builder)
    {
        $repo = app(AuctionRepository::class);
        return $builder
            ->withCount(["biddings"])
            ->setQuery($repo->spatie()->toBase())
//            ->orderByDesc("biddings_count")
            ->whereDate("start_at",">=",now())->limit(3);
//            ->running();
    }

    public function scopeUpcoming(Builder $builder)
    {
        return $builder
            ->where("start_at","<", today()->format("Y-m-d H:i"));
    }

    public function previewedPrice():Attribute
    {
        return new Attribute(fn() => $this->current_price ?: $this->start_price);
    }

    public function scopeActualStatusIs(Builder $builder,string $status = '')
    {
        return match($status) {
            "running"                   => $builder->whereDate("start_at","<=",now())->whereDate("end_at",">=",now()),
            "not started","upcoming"    => $builder->whereDate("start_at",">",now()),
            default                     => $builder->whereDate("end_at","<=",now())
        };
    }
    /**
     * @return bool
     */
    public function isExpired():bool
    {
        return today()->greaterThanOrEqualTo($this->end_at);
    }

    protected static function booted()
    {
        static::addGlobalScope(function (Builder $builder) {
            if(app()->runningInConsole() || ! auth()->check())
                return $builder;
            if(auth()->user()->isClient())
                return $builder->whereNotIn('vendor_id',Block::query()->where('blocked_id',auth()->id())->select("vendor_id"));
            return $builder;
        });
        parent::booted(); // TODO: Change the autogenerated stub
    }

    public function scopeForUser(Builder $builder,User $user,bool $accessFromDashboard = true)
    {
        if($user->typeIs('vendor') && $accessFromDashboard)
            return $builder->whereBelongsTo($user->vendor,'vendor');
        return $builder;
    }

    public function stillRunning():bool
    {
        return now()->lessThanOrEqualTo($this->end_at) && now()->greaterThanOrEqualTo($this->start_at);
    }

    public function notStarted()
    {
        return now()->lessThan($this->start_at);
    }

    public function ended()
    {
        return now()->greaterThanOrEqualTo($this->end_at);
    }

    public function upcoming()
    {
        return now()->lessThan($this->start_at);
    }

    public function status():string
    {
        if($this->stillRunning())
            return "running";
        if($this->notStarted())
            return "not started";
        if($this->upcoming())
            return "upcoming";
        return "ended";
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class,'auction_id');
    }
}
