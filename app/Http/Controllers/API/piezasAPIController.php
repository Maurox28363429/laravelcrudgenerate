<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepiezasAPIRequest;
use App\Http\Requests\API\UpdatepiezasAPIRequest;
use App\Models\piezas;
use App\Repositories\piezasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class piezasController
 * @package App\Http\Controllers\API
 */

class piezasAPIController extends AppBaseController
{
    /** @var  piezasRepository */
    private $piezasRepository;

    public function __construct(piezasRepository $piezasRepo)
    {
        $this->piezasRepository = $piezasRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/piezas",
     *      summary="Get a listing of the piezas.",
     *      tags={"piezas"},
     *      description="Get all piezas",
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
     *                  @SWG\Items(ref="#/definitions/piezas")
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
        $piezas = $this->piezasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $piezas->toArray(),
            __('messages.retrieved', ['model' => __('models/piezas.plural')])
        );
    }

    /**
     * @param CreatepiezasAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/piezas",
     *      summary="Store a newly created piezas in storage",
     *      tags={"piezas"},
     *      description="Store piezas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="piezas that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/piezas")
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
     *                  ref="#/definitions/piezas"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatepiezasAPIRequest $request)
    {
        $input = $request->all();

        $piezas = $this->piezasRepository->create($input);

        return $this->sendResponse(
            $piezas->toArray(),
            __('messages.saved', ['model' => __('models/piezas.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/piezas/{id}",
     *      summary="Display the specified piezas",
     *      tags={"piezas"},
     *      description="Get piezas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of piezas",
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
     *                  ref="#/definitions/piezas"
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
        /** @var piezas $piezas */
        $piezas = $this->piezasRepository->find($id);

        if (empty($piezas)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/piezas.singular')])
            );
        }

        return $this->sendResponse(
            $piezas->toArray(),
            __('messages.retrieved', ['model' => __('models/piezas.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdatepiezasAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/piezas/{id}",
     *      summary="Update the specified piezas in storage",
     *      tags={"piezas"},
     *      description="Update piezas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of piezas",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="piezas that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/piezas")
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
     *                  ref="#/definitions/piezas"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatepiezasAPIRequest $request)
    {
        $input = $request->all();

        /** @var piezas $piezas */
        $piezas = $this->piezasRepository->find($id);

        if (empty($piezas)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/piezas.singular')])
            );
        }

        $piezas = $this->piezasRepository->update($input, $id);

        return $this->sendResponse(
            $piezas->toArray(),
            __('messages.updated', ['model' => __('models/piezas.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/piezas/{id}",
     *      summary="Remove the specified piezas from storage",
     *      tags={"piezas"},
     *      description="Delete piezas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of piezas",
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
        /** @var piezas $piezas */
        $piezas = $this->piezasRepository->find($id);

        if (empty($piezas)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/piezas.singular')])
            );
        }

        $piezas->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/piezas.singular')])
        );
    }
}
