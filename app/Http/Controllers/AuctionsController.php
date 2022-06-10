<?php

namespace App\Http\Controllers;

use App\DataTables\AuctionDataTable;
use App\Entities\Auction;
use App\Entities\Order;
use App\Entities\Product;
use App\Repositories\Contracts\VendorRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AuctionCreateRequest;
use App\Http\Requests\AuctionUpdateRequest;
use App\Repositories\Contracts\AuctionRepository;

/**
 * Class AuctionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class AuctionsController extends Controller
{
    /**
     * @var AuctionRepository
     */
    protected $repository;
    /**
     * AuctionsController constructor.
     *
     * @param AuctionRepository $repository
     */
    public function __construct(AuctionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->cannot('index-auction'))
            abort(403);
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $auctions = $this->repository->scopeQuery(function (){
            return Auction::basedOnAuth();
        })->all();
//        $auctions = $this->repository->with(['products', 'vendor'])->all();
        if (request()->wantsJson()) {
            return response()->json([
                'auctions_data' => $auctions,
            ]);
        }
    }

    public function dataTable(AuctionDataTable $dataTable)
    {
        if(auth()->user()->cannot('index-auction'))
            abort(403);
        return $dataTable->render('auctions.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  AuctionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(AuctionCreateRequest $request)
    {
        try {
            $auction = $this->repository->create($request->validated());

            if($request->validated()['product_ids'])
                Product::query()->whereKey($request->validated()['product_ids'])->cursor()->each->update(['auction_id' => $auction->id]);

            $response = [
                'message' => 'Auction created.',
                'data'    => $auction->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->cannot('show-auction'))
            abort(403);
//        $auction = $this->repository->scopeQuery(function (){
//            return Order::basedOnAuth();
//        })->find($id);
        $auction = $this->repository->find($id)
        ->load(['biddings' => fn($query) => $query->latest()->limit(5)->with('client'),'lastBiding.client'])
        ->loadCount(['biddings']);

        if (request()->wantsJson()) {

            return response()->json([
                'single_auction' => $auction,
            ]);
        }

        return view('auctions.show', compact('auction'));
    }

    public function auctionProducts($id)
    {
        if(auth()->user()->cannot('show-auction'))
            abort(403);
        $products = $this->repository->with(['products'])->find($id)->products;

        if (request()->wantsJson()) {
            return response()->json([
                'auction_products' => $products,
            ]);
        }
    }

    public function create(VendorRepository $vendorRepository)
    {
        if(auth()->user()->cannot('create-auction'))
            abort(403);
        $vendors = $vendorRepository->all();
        return view('auctions.create',compact('vendors'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->cannot('edit-auction'))
            abort(403);
        $auction = $this->repository->find($id);

        return view('auctions.edit', compact('auction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AuctionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(AuctionUpdateRequest $request, $id)
    {
        try {

            $auction = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Auction updated.',
                'data'    => $auction->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->cannot('delete-auction'))
            abort(403);
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Auction deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Auction deleted.');
    }
}
