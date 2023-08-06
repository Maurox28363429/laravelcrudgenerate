<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCargosAPIRequest;
use App\Http\Requests\API\UpdateCargosAPIRequest;
use App\Models\Cargos;
use App\Repositories\CargosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CargosController
 * @package App\Http\Controllers\API
 */

class CargosAPIController extends AppBaseController
{
    /** @var  CargosRepository */
    private $cargosRepository;

    public function __construct(CargosRepository $cargosRepo)
    {
        $this->cargosRepository = $cargosRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cargos",
     *      summary="Get a listing of the Cargos.",
     *      tags={"Cargos"},
     *      description="Get all Cargos",
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
     *                  @SWG\Items(ref="#/definitions/Cargos")
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
        $cargos = $this->cargosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $cargos->toArray(),
            __('messages.retrieved', ['model' => __('models/cargos.plural')])
        );
    }

    /**
     * @param CreateCargosAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cargos",
     *      summary="Store a newly created Cargos in storage",
     *      tags={"Cargos"},
     *      description="Store Cargos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Cargos that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Cargos")
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
     *                  ref="#/definitions/Cargos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCargosAPIRequest $request)
    {
        $input = $request->all();

        $cargos = $this->cargosRepository->create($input);

        return $this->sendResponse(
            $cargos->toArray(),
            __('messages.saved', ['model' => __('models/cargos.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cargos/{id}",
     *      summary="Display the specified Cargos",
     *      tags={"Cargos"},
     *      description="Get Cargos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cargos",
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
     *                  ref="#/definitions/Cargos"
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
        /** @var Cargos $cargos */
        $cargos = $this->cargosRepository->find($id);

        if (empty($cargos)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/cargos.singular')])
            );
        }

        return $this->sendResponse(
            $cargos->toArray(),
            __('messages.retrieved', ['model' => __('models/cargos.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateCargosAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cargos/{id}",
     *      summary="Update the specified Cargos in storage",
     *      tags={"Cargos"},
     *      description="Update Cargos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cargos",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Cargos that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Cargos")
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
     *                  ref="#/definitions/Cargos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCargosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cargos $cargos */
        $cargos = $this->cargosRepository->find($id);

        if (empty($cargos)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/cargos.singular')])
            );
        }

        $cargos = $this->cargosRepository->update($input, $id);

        return $this->sendResponse(
            $cargos->toArray(),
            __('messages.updated', ['model' => __('models/cargos.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cargos/{id}",
     *      summary="Remove the specified Cargos from storage",
     *      tags={"Cargos"},
     *      description="Delete Cargos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cargos",
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
        /** @var Cargos $cargos */
        $cargos = $this->cargosRepository->find($id);

        if (empty($cargos)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/cargos.singular')])
            );
        }

        $cargos->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/cargos.singular')])
        );
    }
}
