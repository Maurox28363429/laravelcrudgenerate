<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsignarAPIRequest;
use App\Http\Requests\API\UpdateAsignarAPIRequest;
use App\Models\Asignar;
use App\Repositories\AsignarRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AsignarController
 * @package App\Http\Controllers\API
 */

class AsignarAPIController extends AppBaseController
{
    /** @var  AsignarRepository */
    private $asignarRepository;

    public function __construct(AsignarRepository $asignarRepo)
    {
        $this->asignarRepository = $asignarRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/asignars",
     *      summary="Get a listing of the Asignars.",
     *      tags={"Asignar"},
     *      description="Get all Asignars",
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
     *                  @SWG\Items(ref="#/definitions/Asignar")
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
        $asignars = $this->asignarRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $asignars->toArray(),
            __('messages.retrieved', ['model' => __('models/asignars.plural')])
        );
    }

    /**
     * @param CreateAsignarAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/asignars",
     *      summary="Store a newly created Asignar in storage",
     *      tags={"Asignar"},
     *      description="Store Asignar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Asignar that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Asignar")
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
     *                  ref="#/definitions/Asignar"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAsignarAPIRequest $request)
    {
        $input = $request->all();

        $asignar = $this->asignarRepository->create($input);

        return $this->sendResponse(
            $asignar->toArray(),
            __('messages.saved', ['model' => __('models/asignars.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/asignars/{id}",
     *      summary="Display the specified Asignar",
     *      tags={"Asignar"},
     *      description="Get Asignar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Asignar",
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
     *                  ref="#/definitions/Asignar"
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
        /** @var Asignar $asignar */
        $asignar = $this->asignarRepository->find($id);

        if (empty($asignar)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/asignars.singular')])
            );
        }

        return $this->sendResponse(
            $asignar->toArray(),
            __('messages.retrieved', ['model' => __('models/asignars.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateAsignarAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/asignars/{id}",
     *      summary="Update the specified Asignar in storage",
     *      tags={"Asignar"},
     *      description="Update Asignar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Asignar",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Asignar that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Asignar")
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
     *                  ref="#/definitions/Asignar"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAsignarAPIRequest $request)
    {
        $input = $request->all();

        /** @var Asignar $asignar */
        $asignar = $this->asignarRepository->find($id);

        if (empty($asignar)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/asignars.singular')])
            );
        }

        $asignar = $this->asignarRepository->update($input, $id);

        return $this->sendResponse(
            $asignar->toArray(),
            __('messages.updated', ['model' => __('models/asignars.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/asignars/{id}",
     *      summary="Remove the specified Asignar from storage",
     *      tags={"Asignar"},
     *      description="Delete Asignar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Asignar",
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
        /** @var Asignar $asignar */
        $asignar = $this->asignarRepository->find($id);

        if (empty($asignar)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/asignars.singular')])
            );
        }

        $asignar->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/asignars.singular')])
        );
    }
}
