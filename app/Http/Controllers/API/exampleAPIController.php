<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateexampleAPIRequest;
use App\Http\Requests\API\UpdateexampleAPIRequest;
use App\Models\example;
use App\Repositories\exampleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class exampleController
 * @package App\Http\Controllers\API
 */

class exampleAPIController extends AppBaseController
{
    /** @var  exampleRepository */
    private $exampleRepository;

    public function __construct(exampleRepository $exampleRepo)
    {
        $this->exampleRepository = $exampleRepo;
    }

    /**
     * Display a listing of the example.
     * GET|HEAD /examples
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $examples = $this->exampleRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $examples->toArray(),
            __('messages.retrieved', ['model' => __('models/examples.plural')])
        );
    }

    /**
     * Store a newly created example in storage.
     * POST /examples
     *
     * @param CreateexampleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateexampleAPIRequest $request)
    {
        $input = $request->all();

        $example = $this->exampleRepository->create($input);

        return $this->sendResponse(
            $example->toArray(),
            __('messages.saved', ['model' => __('models/examples.singular')])
        );
    }

    /**
     * Display the specified example.
     * GET|HEAD /examples/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var example $example */
        $example = $this->exampleRepository->find($id);

        if (empty($example)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/examples.singular')])
            );
        }

        return $this->sendResponse(
            $example->toArray(),
            __('messages.retrieved', ['model' => __('models/examples.singular')])
        );
    }

    /**
     * Update the specified example in storage.
     * PUT/PATCH /examples/{id}
     *
     * @param int $id
     * @param UpdateexampleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateexampleAPIRequest $request)
    {
        $input = $request->all();

        /** @var example $example */
        $example = $this->exampleRepository->find($id);

        if (empty($example)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/examples.singular')])
            );
        }

        $example = $this->exampleRepository->update($input, $id);

        return $this->sendResponse(
            $example->toArray(),
            __('messages.updated', ['model' => __('models/examples.singular')])
        );
    }

    /**
     * Remove the specified example from storage.
     * DELETE /examples/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var example $example */
        $example = $this->exampleRepository->find($id);

        if (empty($example)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/examples.singular')])
            );
        }

        $example->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/examples.singular')])
        );
    }
}
