<?php

namespace App\Http\Controllers;

use App\DataTables\VendorDataTable;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\VendorCreateRequest;
use App\Http\Requests\VendorUpdateRequest;
use App\Repositories\Contracts\VendorRepository;

/**
 * Class VendorsController.
 *
 * @package namespace App\Http\Controllers;
 */
class VendorsController extends Controller
{
    /**
     * @var VendorRepository
     */
    protected $repository;


    /**
     * VendorsController constructor.
     *
     * @param VendorRepository $repository
     */
    public function __construct(VendorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function dataTable(VendorDataTable $dataTable)
    {
        if(request()->user()->cannot('index-vendor'))
            abort(403);
        return $dataTable->render('vendors.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->user()->cannot('index-vendor'))
            abort(403);
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $vendors = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $vendors,
            ]);
        }
//
//        return view('vendors.index', compact('vendors'));
    }

    public function create()
    {
        if(auth()->user()->cannot('create-vendor'))
            abort(403);
        return view('vendors.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  VendorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(VendorCreateRequest $request)
    {
        try {

            $vendor = $this->repository->create($request->only(['name', 'email', 'website', 'description']));
            $vendor->owner()->create(['is_owner' => 1])->user()->create($request['owner']);
            $response = [
                'message' => 'Vendor created.',
                'data'    => $vendor->toArray(),
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

            toastr()->success('You Created Vendor Successfully');
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
        if(auth()->user()->cannot('show-vendor'))
            abort(403);
        $vendor = $this->repository->find($id)
        ->load(['employees','runningAuctions','upcomingAuctions','pastAuctions'])
        ->loadCount(['auctions','employees','runningAuctions','upcomingAuctions','pastAuctions'])
        ->loadSum(['auctions','runningAuctions','upcomingAuctions','pastAuctions'],'current_price')
        ->loadSum(['auctions','runningAuctions','upcomingAuctions','pastAuctions'],'start_price');
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $vendor,
            ]);
        }

        return view('vendors.show', compact('vendor'));
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
        if(auth()->user()->cannot('edit-vendor'))
            abort(403);
        $vendor = $this->repository->with(['owner'])->find($id);
        return view('vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VendorUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(VendorUpdateRequest $request, $id)
    {
        try {
            $vendor = $this->repository->update($request->only(['name', 'email', 'website', 'description']), $id);
            $vendor->owner->user()->update($request['owner']);
            $response = [
                'message' => 'Vendor updated.',
                'data'    => $vendor->toArray(),
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
        if(auth()->user()->cannot('delete-vendor'))
            abort(403);
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Vendor deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Vendor deleted.');
    }
}
