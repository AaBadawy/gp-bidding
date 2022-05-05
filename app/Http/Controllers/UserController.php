<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * View Path
     *
     * @var string
     */
    protected string $viewPath = 'user';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected string $resourceRoute = 'users';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected string $domainAlias = 'users';

    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function dataTable(Request $request,string $user_type)
    {
        $userDatatable = UserDataTable::make($user_type);

        return $userDatatable->render("users.index");
    }

    public function index(Request $request,string $user_type)
    {

    }

    public function show(string $user_type,User $user)
    {
        $user = match($user->type) {
            'vendor'    => $user
                ->load(['vendor' => fn($query) => $query
                    ->with(['runningAuctions','upcomingAuctions','pastAuctions','auctions'])
                    ->withCount('runningAuctions','upcomingAuctions','pastAuctions','auctions')]),
            'client'    => $user->loadCount(['wonAuctions','involvedAuctionsDistinct'])->loadSum(['wonAuctions','involvedAuctionsDistinct'],'current_price'),
            'admin'     => $user,
        };

        return view("users.show.$user_type",compact('user'));
    }
}
