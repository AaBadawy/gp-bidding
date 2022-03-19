<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\VendorRequestCreateRequest;
use App\Http\Requests\VendorRequestUpdateRequest;
use App\Repositories\Contracts\VendorRequestRepository;
use App\Validators\VendorRequestValidator;

/**
 * Class VendorRequestsController.
 *
 * @package namespace App\Http\Controllers;
 */
class VendorRequestsController extends Controller
{
    /**
     * @var VendorRequestRepository
     */
    protected $repository;

    /**
     * @var VendorRequestValidator
     */
    protected $validator;

    /**
     * VendorRequestsController constructor.
     *
     * @param VendorRequestRepository $repository
     * @param VendorRequestValidator $validator
     */
    public function __construct(VendorRequestRepository $repository, VendorRequestValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $vendorRequests = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $vendorRequests,
            ]);
        }

        return view('vendorRequests.index', compact('vendorRequests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VendorRequestCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(VendorRequestCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $vendorRequest = $this->repository->create($request->all());

            $response = [
                'message' => 'VendorRequest created.',
                'data'    => $vendorRequest->toArray(),
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
        $vendorRequest = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $vendorRequest,
            ]);
        }

        return view('vendorRequests.show', compact('vendorRequest'));
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
        $vendorRequest = $this->repository->find($id);

        return view('vendorRequests.edit', compact('vendorRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VendorRequestUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(VendorRequestUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $vendorRequest = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'VendorRequest updated.',
                'data'    => $vendorRequest->toArray(),
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
                'message' => 'VendorRequest deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'VendorRequest deleted.');
    }
}
