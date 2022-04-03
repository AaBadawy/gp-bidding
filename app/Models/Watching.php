<?php

namespace App\Models;

use App\Entities\Auction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watching extends Model
{
    use HasFactory;

    protected $table = "watching";

    protected $fillable = [
        "client_id",
        "auction_id",
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class,"auction_id");
    }

    public function client()
    {
        return $this->belongsTo(User::class,"client_id");
    }
}
