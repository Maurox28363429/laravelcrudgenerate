<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnalistas_exampleAPIRequest;
use App\Http\Requests\API\UpdateAnalistas_exampleAPIRequest;
use App\Models\Analistas_example;
use App\Repositories\Analistas_exampleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Analistas_exampleController
 * @package App\Http\Controllers\API
 */

class Analistas_exampleAPIController extends AppBaseController
{
    /** @var  Analistas_exampleRepository */
    private $analistasExampleRepository;

    public function __construct(Analistas_exampleRepository $analistasExampleRepo)
    {
        $this->analistasExampleRepository = $analistasExampleRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/analistasExamples",
     *      summary="Get a listing of the Analistas_examples.",
     *      tags={"Analistas_example"},
     *      description="Get all Analistas_examples",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Analistas_example")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $analistasExamples = $this->analistasExampleRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $analistasExamples->toArray(),
            __('messages.retrieved', ['model' => __('models/analistasExamples.plural')])
        );
    }

    /**
     * @param CreateAnalistas_exampleAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/analistasExamples",
     *      summary="Store a newly created Analistas_example in storage",
     *      tags={"Analistas_example"},
     *      description="Store Analistas_example",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Analistas_example that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Analistas_example")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Analistas_example"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAnalistas_exampleAPIRequest $request)
    {
        $input = $request->all();

        $analistasExample = $this->analistasExampleRepository->create($input);

        return $this->sendResponse(
            $analistasExample->toArray(),
            __('messages.saved', ['model' => __('models/analistasExamples.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/analistasExamples/{id}",
     *      summary="Display the specified Analistas_example",
     *      tags={"Analistas_example"},
     *      description="Get Analistas_example",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Analistas_example",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Analistas_example"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Analistas_example $analistasExample */
        $analistasExample = $this->analistasExampleRepository->find($id);

        if (empty($analistasExample)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/analistasExamples.singular')])
            );
        }

        return $this->sendResponse(
            $analistasExample->toArray(),
            __('messages.retrieved', ['model' => __('models/analistasExamples.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateAnalistas_exampleAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/analistasExamples/{id}",
     *      summary="Update the specified Analistas_example in storage",
     *      tags={"Analistas_example"},
     *      description="Update Analistas_example",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Analistas_example",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Analistas_example that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Analistas_example")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Analistas_example"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAnalistas_exampleAPIRequest $request)
    {
        $input = $request->all();

        /** @var Analistas_example $analistasExample */
        $analistasExample = $this->analistasExampleRepository->find($id);

        if (empty($analistasExample)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/analistasExamples.singular')])
            );
        }

        $analistasExample = $this->analistasExampleRepository->update($input, $id);

        return $this->sendResponse(
            $analistasExample->toArray(),
            __('messages.updated', ['model' => __('models/analistasExamples.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/analistasExamples/{id}",
     *      summary="Remove the specified Analistas_example from storage",
     *      tags={"Analistas_example"},
     *      description="Delete Analistas_example",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Analistas_example",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Analistas_example $analistasExample */
        $analistasExample = $this->analistasExampleRepository->find($id);

        if (empty($analistasExample)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/analistasExamples.singular')])
            );
        }

        $analistasExample->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/analistasExamples.singular')])
        );
    }
}
