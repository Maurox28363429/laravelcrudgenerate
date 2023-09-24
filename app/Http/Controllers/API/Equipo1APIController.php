<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEquipo1APIRequest;
use App\Http\Requests\API\UpdateEquipo1APIRequest;
use App\Models\Equipo1;
use App\Repositories\Equipo1Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Equipo1Controller
 * @package App\Http\Controllers\API
 */

class Equipo1APIController extends AppBaseController
{
    /** @var  Equipo1Repository */
    private $equipo1Repository;

    public function __construct(Equipo1Repository $equipo1Repo)
    {
        $this->equipo1Repository = $equipo1Repo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/equipo1s",
     *      summary="Get a listing of the Equipo1s.",
     *      tags={"Equipo1"},
     *      description="Get all Equipo1s",
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
     *                  @SWG\Items(ref="#/definitions/Equipo1")
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
        $equipo1s = $this->equipo1Repository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $equipo1s->toArray(),
            __('messages.retrieved', ['model' => __('models/equipo1s.plural')])
        );
    }

    /**
     * @param CreateEquipo1APIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/equipo1s",
     *      summary="Store a newly created Equipo1 in storage",
     *      tags={"Equipo1"},
     *      description="Store Equipo1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Equipo1 that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Equipo1")
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
     *                  ref="#/definitions/Equipo1"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEquipo1APIRequest $request)
    {
        $input = $request->all();

        $equipo1 = $this->equipo1Repository->create($input);

        return $this->sendResponse(
            $equipo1->toArray(),
            __('messages.saved', ['model' => __('models/equipo1s.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/equipo1s/{id}",
     *      summary="Display the specified Equipo1",
     *      tags={"Equipo1"},
     *      description="Get Equipo1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Equipo1",
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
     *                  ref="#/definitions/Equipo1"
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
        /** @var Equipo1 $equipo1 */
        $equipo1 = $this->equipo1Repository->find($id);

        if (empty($equipo1)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/equipo1s.singular')])
            );
        }

        return $this->sendResponse(
            $equipo1->toArray(),
            __('messages.retrieved', ['model' => __('models/equipo1s.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateEquipo1APIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/equipo1s/{id}",
     *      summary="Update the specified Equipo1 in storage",
     *      tags={"Equipo1"},
     *      description="Update Equipo1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Equipo1",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Equipo1 that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Equipo1")
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
     *                  ref="#/definitions/Equipo1"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEquipo1APIRequest $request)
    {
        $input = $request->all();

        /** @var Equipo1 $equipo1 */
        $equipo1 = $this->equipo1Repository->find($id);

        if (empty($equipo1)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/equipo1s.singular')])
            );
        }

        $equipo1 = $this->equipo1Repository->update($input, $id);

        return $this->sendResponse(
            $equipo1->toArray(),
            __('messages.updated', ['model' => __('models/equipo1s.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/equipo1s/{id}",
     *      summary="Remove the specified Equipo1 from storage",
     *      tags={"Equipo1"},
     *      description="Delete Equipo1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Equipo1",
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
        /** @var Equipo1 $equipo1 */
        $equipo1 = $this->equipo1Repository->find($id);

        if (empty($equipo1)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/equipo1s.singular')])
            );
        }

        $equipo1->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/equipo1s.singular')])
        );
    }
}
