<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateherramientasAPIRequest;
use App\Http\Requests\API\UpdateherramientasAPIRequest;
use App\Models\herramientas;
use App\Repositories\herramientasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class herramientasController
 * @package App\Http\Controllers\API
 */

class herramientasAPIController extends AppBaseController
{
    /** @var  herramientasRepository */
    private $herramientasRepository;

    public function __construct(herramientasRepository $herramientasRepo)
    {
        $this->herramientasRepository = $herramientasRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/herramientas",
     *      summary="Get a listing of the herramientas.",
     *      tags={"herramientas"},
     *      description="Get all herramientas",
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
     *                  @SWG\Items(ref="#/definitions/herramientas")
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
        $herramientas = $this->herramientasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $herramientas->toArray(),
            __('messages.retrieved', ['model' => __('models/herramientas.plural')])
        );
    }

    /**
     * @param CreateherramientasAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/herramientas",
     *      summary="Store a newly created herramientas in storage",
     *      tags={"herramientas"},
     *      description="Store herramientas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="herramientas that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/herramientas")
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
     *                  ref="#/definitions/herramientas"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateherramientasAPIRequest $request)
    {
        $input = $request->all();

        $herramientas = $this->herramientasRepository->create($input);

        return $this->sendResponse(
            $herramientas->toArray(),
            __('messages.saved', ['model' => __('models/herramientas.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/herramientas/{id}",
     *      summary="Display the specified herramientas",
     *      tags={"herramientas"},
     *      description="Get herramientas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of herramientas",
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
     *                  ref="#/definitions/herramientas"
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
        /** @var herramientas $herramientas */
        $herramientas = $this->herramientasRepository->find($id);

        if (empty($herramientas)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/herramientas.singular')])
            );
        }

        return $this->sendResponse(
            $herramientas->toArray(),
            __('messages.retrieved', ['model' => __('models/herramientas.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateherramientasAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/herramientas/{id}",
     *      summary="Update the specified herramientas in storage",
     *      tags={"herramientas"},
     *      description="Update herramientas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of herramientas",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="herramientas that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/herramientas")
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
     *                  ref="#/definitions/herramientas"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateherramientasAPIRequest $request)
    {
        $input = $request->all();

        /** @var herramientas $herramientas */
        $herramientas = $this->herramientasRepository->find($id);

        if (empty($herramientas)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/herramientas.singular')])
            );
        }

        $herramientas = $this->herramientasRepository->update($input, $id);

        return $this->sendResponse(
            $herramientas->toArray(),
            __('messages.updated', ['model' => __('models/herramientas.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/herramientas/{id}",
     *      summary="Remove the specified herramientas from storage",
     *      tags={"herramientas"},
     *      description="Delete herramientas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of herramientas",
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
        /** @var herramientas $herramientas */
        $herramientas = $this->herramientasRepository->find($id);

        if (empty($herramientas)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/herramientas.singular')])
            );
        }

        $herramientas->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/herramientas.singular')])
        );
    }
}
