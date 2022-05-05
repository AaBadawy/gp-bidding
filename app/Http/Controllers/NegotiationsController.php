<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\NegotiationCreateRequest;
use App\Http\Requests\NegotiationUpdateRequest;
use App\Repositories\Contracts\NegotiationRepository;
use App\Validators\NegotiationValidator;

/**
 * Class NegotiationsController.
 *
 * @package namespace App\Http\Controllers;
 */
class NegotiationsController extends Controller
{
    /**
     * @var NegotiationRepository
     */
    protected $repository;

    /**
     * @var NegotiationValidator
     */
    protected $validator;

    /**
     * NegotiationsController constructor.
     *
     * @param NegotiationRepository $repository
     * @param NegotiationValidator $validator
     */
    public function __construct(NegotiationRepository $repository, NegotiationValidator $validator)
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
        $negotiations = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $negotiations,
            ]);
        }

        return view('negotiations.index', compact('negotiations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NegotiationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(NegotiationCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $negotiation = $this->repository->create($request->all());

            $response = [
                'message' => 'Negotiation created.',
                'data'    => $negotiation->toArray(),
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
        $negotiation = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $negotiation,
            ]);
        }

        return view('negotiations.show', compact('negotiation'));
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
        $negotiation = $this->repository->find($id);

        return view('negotiations.edit', compact('negotiation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NegotiationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(NegotiationUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $negotiation = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Negotiation updated.',
                'data'    => $negotiation->toArray(),
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
                'message' => 'Negotiation deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Negotiation deleted.');
    }
}
