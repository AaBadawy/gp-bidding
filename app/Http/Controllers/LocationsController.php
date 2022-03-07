<?php

namespace App\Http\Controllers;

use App\DataTables\LocationDataTable;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\LocationCreateRequest;
use App\Http\Requests\LocationUpdateRequest;
use App\Repositories\Contracts\LocationRepository;

/**
 * Class LocationsController.
 *
 * @package namespace App\Http\Controllers;
 */
class LocationsController extends Controller
{
    /**
     * @var LocationRepository
     */
    protected $repository;

    /**
     * LocationsController constructor.
     *
     * @param LocationRepository $repository
     */
    public function __construct(LocationRepository $repository)
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
        if(request()->user()->userable->cannot('show-location'))
            abort(403);
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $locations = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $locations,
            ]);
        }

        return view('locations.index', compact('locations'));
    }

    /**
     * @param LocationDataTable $dataTable
     * @return mixed
     */
    public function dataTable(LocationDataTable $dataTable)
    {
        if(request()->user()->userable->cannot('index-location'))
            abort(403);
        return $dataTable->render('locations.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        if(request()->user()->userable->cannot('create-location'))
            abort(403);

        toastr()->info('You Created Location Successfully');
        return view('locations.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  LocationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(LocationCreateRequest $request)
    {
        try {


            $location = $this->repository->create($request->all());

            $response = [
                'message' => 'Location created.',
                'data'    => $location->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            toastr()->success('You Created Location Successfully');
            return redirect()->back();
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
        if(request()->user()->userable->cannot('show-location'))
            abort(403);
        $location = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $location,
            ]);
        }

        return view('locations.show', compact('location'));
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
        if(request()->user()->userable->cannot('edit-location'))
            abort(403);
        $location = $this->repository->find($id);

        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LocationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(LocationUpdateRequest $request, $id)
    {
        try {


            $location = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Location updated.',
                'data'    => $location->toArray(),
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
        if(request()->user()->userable->cannot('delete-location'))
            abort(403);
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Location deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Location deleted.');
    }
}
