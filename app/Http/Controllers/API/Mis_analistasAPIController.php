<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMis_analistasAPIRequest;
use App\Http\Requests\API\UpdateMis_analistasAPIRequest;
use App\Models\Mis_analistas;
use App\Repositories\Mis_analistasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Mis_analistasController
 * @package App\Http\Controllers\API
 */

class Mis_analistasAPIController extends AppBaseController
{
    /** @var  Mis_analistasRepository */
    private $misAnalistasRepository;

    public function __construct(Mis_analistasRepository $misAnalistasRepo)
    {
        $this->misAnalistasRepository = $misAnalistasRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/misAnalistas",
     *      summary="Get a listing of the Mis_analistas.",
     *      tags={"Mis_analistas"},
     *      description="Get all Mis_analistas",
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
     *                  @SWG\Items(ref="#/definitions/Mis_analistas")
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
        $misAnalistas = $this->misAnalistasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $misAnalistas->toArray(),
            __('messages.retrieved', ['model' => __('models/misAnalistas.plural')])
        );
    }

    /**
     * @param CreateMis_analistasAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/misAnalistas",
     *      summary="Store a newly created Mis_analistas in storage",
     *      tags={"Mis_analistas"},
     *      description="Store Mis_analistas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Mis_analistas that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Mis_analistas")
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
     *                  ref="#/definitions/Mis_analistas"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMis_analistasAPIRequest $request)
    {
        $input = $request->all();

        $misAnalistas = $this->misAnalistasRepository->create($input);

        return $this->sendResponse(
            $misAnalistas->toArray(),
            __('messages.saved', ['model' => __('models/misAnalistas.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/misAnalistas/{id}",
     *      summary="Display the specified Mis_analistas",
     *      tags={"Mis_analistas"},
     *      description="Get Mis_analistas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Mis_analistas",
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
     *                  ref="#/definitions/Mis_analistas"
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
        /** @var Mis_analistas $misAnalistas */
        $misAnalistas = $this->misAnalistasRepository->find($id);

        if (empty($misAnalistas)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/misAnalistas.singular')])
            );
        }

        return $this->sendResponse(
            $misAnalistas->toArray(),
            __('messages.retrieved', ['model' => __('models/misAnalistas.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateMis_analistasAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/misAnalistas/{id}",
     *      summary="Update the specified Mis_analistas in storage",
     *      tags={"Mis_analistas"},
     *      description="Update Mis_analistas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Mis_analistas",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Mis_analistas that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Mis_analistas")
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
     *                  ref="#/definitions/Mis_analistas"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMis_analistasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Mis_analistas $misAnalistas */
        $misAnalistas = $this->misAnalistasRepository->find($id);

        if (empty($misAnalistas)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/misAnalistas.singular')])
            );
        }

        $misAnalistas = $this->misAnalistasRepository->update($input, $id);

        return $this->sendResponse(
            $misAnalistas->toArray(),
            __('messages.updated', ['model' => __('models/misAnalistas.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/misAnalistas/{id}",
     *      summary="Remove the specified Mis_analistas from storage",
     *      tags={"Mis_analistas"},
     *      description="Delete Mis_analistas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Mis_analistas",
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
        /** @var Mis_analistas $misAnalistas */
        $misAnalistas = $this->misAnalistasRepository->find($id);

        if (empty($misAnalistas)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/misAnalistas.singular')])
            );
        }

        $misAnalistas->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/misAnalistas.singular')])
        );
    }
}
