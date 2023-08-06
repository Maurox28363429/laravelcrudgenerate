<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAreas_De_TrabajoAPIRequest;
use App\Http\Requests\API\UpdateAreas_De_TrabajoAPIRequest;
use App\Models\Areas_De_Trabajo;
use App\Repositories\Areas_De_TrabajoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Areas_De_TrabajoController
 * @package App\Http\Controllers\API
 */

class Areas_De_TrabajoAPIController extends AppBaseController
{
    /** @var  Areas_De_TrabajoRepository */
    private $areasDeTrabajoRepository;

    public function __construct(Areas_De_TrabajoRepository $areasDeTrabajoRepo)
    {
        $this->areasDeTrabajoRepository = $areasDeTrabajoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/areasDeTrabajos",
     *      summary="Get a listing of the Areas_De_Trabajos.",
     *      tags={"Areas_De_Trabajo"},
     *      description="Get all Areas_De_Trabajos",
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
     *                  @SWG\Items(ref="#/definitions/Areas_De_Trabajo")
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
        $areasDeTrabajos = $this->areasDeTrabajoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $areasDeTrabajos->toArray(),
            __('messages.retrieved', ['model' => __('models/areasDeTrabajos.plural')])
        );
    }

    /**
     * @param CreateAreas_De_TrabajoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/areasDeTrabajos",
     *      summary="Store a newly created Areas_De_Trabajo in storage",
     *      tags={"Areas_De_Trabajo"},
     *      description="Store Areas_De_Trabajo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Areas_De_Trabajo that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Areas_De_Trabajo")
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
     *                  ref="#/definitions/Areas_De_Trabajo"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAreas_De_TrabajoAPIRequest $request)
    {
        $input = $request->all();

        $areasDeTrabajo = $this->areasDeTrabajoRepository->create($input);

        return $this->sendResponse(
            $areasDeTrabajo->toArray(),
            __('messages.saved', ['model' => __('models/areasDeTrabajos.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/areasDeTrabajos/{id}",
     *      summary="Display the specified Areas_De_Trabajo",
     *      tags={"Areas_De_Trabajo"},
     *      description="Get Areas_De_Trabajo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Areas_De_Trabajo",
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
     *                  ref="#/definitions/Areas_De_Trabajo"
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
        /** @var Areas_De_Trabajo $areasDeTrabajo */
        $areasDeTrabajo = $this->areasDeTrabajoRepository->find($id);

        if (empty($areasDeTrabajo)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/areasDeTrabajos.singular')])
            );
        }

        return $this->sendResponse(
            $areasDeTrabajo->toArray(),
            __('messages.retrieved', ['model' => __('models/areasDeTrabajos.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateAreas_De_TrabajoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/areasDeTrabajos/{id}",
     *      summary="Update the specified Areas_De_Trabajo in storage",
     *      tags={"Areas_De_Trabajo"},
     *      description="Update Areas_De_Trabajo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Areas_De_Trabajo",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Areas_De_Trabajo that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Areas_De_Trabajo")
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
     *                  ref="#/definitions/Areas_De_Trabajo"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAreas_De_TrabajoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Areas_De_Trabajo $areasDeTrabajo */
        $areasDeTrabajo = $this->areasDeTrabajoRepository->find($id);

        if (empty($areasDeTrabajo)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/areasDeTrabajos.singular')])
            );
        }

        $areasDeTrabajo = $this->areasDeTrabajoRepository->update($input, $id);

        return $this->sendResponse(
            $areasDeTrabajo->toArray(),
            __('messages.updated', ['model' => __('models/areasDeTrabajos.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/areasDeTrabajos/{id}",
     *      summary="Remove the specified Areas_De_Trabajo from storage",
     *      tags={"Areas_De_Trabajo"},
     *      description="Delete Areas_De_Trabajo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Areas_De_Trabajo",
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
        /** @var Areas_De_Trabajo $areasDeTrabajo */
        $areasDeTrabajo = $this->areasDeTrabajoRepository->find($id);

        if (empty($areasDeTrabajo)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/areasDeTrabajos.singular')])
            );
        }

        $areasDeTrabajo->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/areasDeTrabajos.singular')])
        );
    }
}
