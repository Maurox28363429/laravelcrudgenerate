<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedepartamentosAPIRequest;
use App\Http\Requests\API\UpdatedepartamentosAPIRequest;
use App\Models\departamentos;
use App\Repositories\departamentosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class departamentosController
 * @package App\Http\Controllers\API
 */

class departamentosAPIController extends AppBaseController
{
    /** @var  departamentosRepository */
    private $departamentosRepository;

    public function __construct(departamentosRepository $departamentosRepo)
    {
        $this->departamentosRepository = $departamentosRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/departamentos",
     *      summary="Get a listing of the departamentos.",
     *      tags={"departamentos"},
     *      description="Get all departamentos",
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
     *                  @SWG\Items(ref="#/definitions/departamentos")
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
        $departamentos = $this->departamentosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $departamentos->toArray(),
            __('messages.retrieved', ['model' => __('models/departamentos.plural')])
        );
    }

    /**
     * @param CreatedepartamentosAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/departamentos",
     *      summary="Store a newly created departamentos in storage",
     *      tags={"departamentos"},
     *      description="Store departamentos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="departamentos that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/departamentos")
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
     *                  ref="#/definitions/departamentos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatedepartamentosAPIRequest $request)
    {
        $input = $request->all();

        $departamentos = $this->departamentosRepository->create($input);

        return $this->sendResponse(
            $departamentos->toArray(),
            __('messages.saved', ['model' => __('models/departamentos.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/departamentos/{id}",
     *      summary="Display the specified departamentos",
     *      tags={"departamentos"},
     *      description="Get departamentos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of departamentos",
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
     *                  ref="#/definitions/departamentos"
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
        /** @var departamentos $departamentos */
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/departamentos.singular')])
            );
        }

        return $this->sendResponse(
            $departamentos->toArray(),
            __('messages.retrieved', ['model' => __('models/departamentos.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdatedepartamentosAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/departamentos/{id}",
     *      summary="Update the specified departamentos in storage",
     *      tags={"departamentos"},
     *      description="Update departamentos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of departamentos",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="departamentos that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/departamentos")
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
     *                  ref="#/definitions/departamentos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatedepartamentosAPIRequest $request)
    {
        $input = $request->all();

        /** @var departamentos $departamentos */
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/departamentos.singular')])
            );
        }

        $departamentos = $this->departamentosRepository->update($input, $id);

        return $this->sendResponse(
            $departamentos->toArray(),
            __('messages.updated', ['model' => __('models/departamentos.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/departamentos/{id}",
     *      summary="Remove the specified departamentos from storage",
     *      tags={"departamentos"},
     *      description="Delete departamentos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of departamentos",
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
        /** @var departamentos $departamentos */
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/departamentos.singular')])
            );
        }

        $departamentos->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/departamentos.singular')])
        );
    }
}
