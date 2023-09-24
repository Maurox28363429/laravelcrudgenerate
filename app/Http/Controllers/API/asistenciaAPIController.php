<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateasistenciaAPIRequest;
use App\Http\Requests\API\UpdateasistenciaAPIRequest;
use App\Models\asistencia;
use App\Repositories\asistenciaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class asistenciaController
 * @package App\Http\Controllers\API
 */

class asistenciaAPIController extends AppBaseController
{
    /** @var  asistenciaRepository */
    private $asistenciaRepository;

    public function __construct(asistenciaRepository $asistenciaRepo)
    {
        $this->asistenciaRepository = $asistenciaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/asistencias",
     *      summary="Get a listing of the asistencias.",
     *      tags={"asistencia"},
     *      description="Get all asistencias",
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
     *                  @SWG\Items(ref="#/definitions/asistencia")
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
        $asistencias = $this->asistenciaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $asistencias->toArray(),
            __('messages.retrieved', ['model' => __('models/asistencias.plural')])
        );
    }

    /**
     * @param CreateasistenciaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/asistencias",
     *      summary="Store a newly created asistencia in storage",
     *      tags={"asistencia"},
     *      description="Store asistencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="asistencia that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/asistencia")
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
     *                  ref="#/definitions/asistencia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateasistenciaAPIRequest $request)
    {
        $input = $request->all();

        $asistencia = $this->asistenciaRepository->create($input);

        return $this->sendResponse(
            $asistencia->toArray(),
            __('messages.saved', ['model' => __('models/asistencias.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/asistencias/{id}",
     *      summary="Display the specified asistencia",
     *      tags={"asistencia"},
     *      description="Get asistencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of asistencia",
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
     *                  ref="#/definitions/asistencia"
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
        /** @var asistencia $asistencia */
        $asistencia = $this->asistenciaRepository->find($id);

        if (empty($asistencia)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/asistencias.singular')])
            );
        }

        return $this->sendResponse(
            $asistencia->toArray(),
            __('messages.retrieved', ['model' => __('models/asistencias.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateasistenciaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/asistencias/{id}",
     *      summary="Update the specified asistencia in storage",
     *      tags={"asistencia"},
     *      description="Update asistencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of asistencia",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="asistencia that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/asistencia")
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
     *                  ref="#/definitions/asistencia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateasistenciaAPIRequest $request)
    {
        $input = $request->all();

        /** @var asistencia $asistencia */
        $asistencia = $this->asistenciaRepository->find($id);

        if (empty($asistencia)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/asistencias.singular')])
            );
        }

        $asistencia = $this->asistenciaRepository->update($input, $id);

        return $this->sendResponse(
            $asistencia->toArray(),
            __('messages.updated', ['model' => __('models/asistencias.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/asistencias/{id}",
     *      summary="Remove the specified asistencia from storage",
     *      tags={"asistencia"},
     *      description="Delete asistencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of asistencia",
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
        /** @var asistencia $asistencia */
        $asistencia = $this->asistenciaRepository->find($id);

        if (empty($asistencia)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/asistencias.singular')])
            );
        }

        $asistencia->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/asistencias.singular')])
        );
    }
}
