<?php

namespace App\Http\Controllers;

use App\DataTables\BidDataTable;
use App\Entities\Auction;
use App\Exceptions\ValidationException;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BidddingCreateRequest;
use App\Http\Requests\BidddingUpdateRequest;
use App\Repositories\Contracts\BiddingRepository;
use App\Validators\BidddingValidator;

/**
 * Class BidddingsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BiddingsController extends Controller
{
    /**
     * @var BiddingRepository
     */
    protected $repository;

    /**
     * BidddingsController constructor.
     *
     * @param BiddingRepository $repository
     */
    public function __construct(BiddingRepository $repository)
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
        $bidddings = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $bidddings,
            ]);
        }

        return view('bidddings.index', compact('bidddings'));
    }

    public function dataTable(BidDataTable $dataTable)
    {
        return $dataTable->render("bids.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BidddingCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BidddingCreateRequest $request)
    {
        try {

            $bidding = $this->repository->create($request->validated());

            $response = [
                'message' => 'Bidding created.',
                'data'    => $bidding->toArray(),
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
        $bidding = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $bidding,
            ]);
        }

        return view('bidddings.show', compact('biddding'));
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
        $bidding = $this->repository->find($id);

        return view('bidddings.edit', compact('bidding'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BidddingUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BidddingUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $bidding = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Bidding updated.',
                'data'    => $bidding->toArray(),
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
                'message' => 'Bidding deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Biddding deleted.');
    }
}
