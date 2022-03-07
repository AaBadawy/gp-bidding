<?php

namespace App\Http\Controllers;

use App\Entities\Auction;
use App\Entities\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AuctionRatingCreateRequest;
use App\Http\Requests\AuctionRatingUpdateRequest;
use App\Repositories\Contracts\AuctionRatingRepository;

/**
 * Class AuctionRatingsController.
 *
 * @package namespace App\Http\Controllers;
 */
class AuctionRatingsController extends Controller
{
    /**
     * @var AuctionRatingRepository
     */
    protected $repository;

    /**
     * AuctionRatingsController constructor.
     *
     * @param AuctionRatingRepository $repository
     */
    public function __construct(AuctionRatingRepository $repository)
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
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $auctionRatings = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $auctionRatings,
            ]);
        }

        return view('auctionRatings.index', compact('auctionRatings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AuctionRatingCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(AuctionRatingCreateRequest $request)
    {
        try {

            $auctionRating = $this->repository->create($request->only(['product_id','rating_stars','description']));

            $response = [
                'message' => 'AuctionRating created.',
                'data'    => $auctionRating->toArray(),
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
        $auctionRating = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $auctionRating,
            ]);
        }

        return view('auctionRatings.show', compact('auctionRating'));
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
        $auctionRating = $this->repository->find($id);

        return view('auctionRatings.edit', compact('auctionRating'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AuctionRatingUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(AuctionRatingUpdateRequest $request, $id)
    {
        try {

            $auctionRating = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'AuctionRating updated.',
                'data'    => $auctionRating->toArray(),
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
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'AuctionRating deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'AuctionRating deleted.');
    }
}
