<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createactivos_de_la_empresaAPIRequest;
use App\Http\Requests\API\Updateactivos_de_la_empresaAPIRequest;
use App\Models\activos_de_la_empresa;
use App\Repositories\activos_de_la_empresaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class activos_de_la_empresaController
 * @package App\Http\Controllers\API
 */

class activos_de_la_empresaAPIController extends AppBaseController
{
    /** @var  activos_de_la_empresaRepository */
    private $activosDeLaEmpresaRepository;

    public function __construct(activos_de_la_empresaRepository $activosDeLaEmpresaRepo)
    {
        $this->activosDeLaEmpresaRepository = $activosDeLaEmpresaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/activosDeLaEmpresas",
     *      summary="Get a listing of the activos_de_la_empresas.",
     *      tags={"activos_de_la_empresa"},
     *      description="Get all activos_de_la_empresas",
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
     *                  @SWG\Items(ref="#/definitions/activos_de_la_empresa")
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
        $activosDeLaEmpresas = $this->activosDeLaEmpresaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $activosDeLaEmpresas->toArray(),
            __('messages.retrieved', ['model' => __('models/activosDeLaEmpresas.plural')])
        );
    }

    /**
     * @param Createactivos_de_la_empresaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/activosDeLaEmpresas",
     *      summary="Store a newly created activos_de_la_empresa in storage",
     *      tags={"activos_de_la_empresa"},
     *      description="Store activos_de_la_empresa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="activos_de_la_empresa that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/activos_de_la_empresa")
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
     *                  ref="#/definitions/activos_de_la_empresa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createactivos_de_la_empresaAPIRequest $request)
    {
        $input = $request->all();

        $activosDeLaEmpresa = $this->activosDeLaEmpresaRepository->create($input);

        return $this->sendResponse(
            $activosDeLaEmpresa->toArray(),
            __('messages.saved', ['model' => __('models/activosDeLaEmpresas.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/activosDeLaEmpresas/{id}",
     *      summary="Display the specified activos_de_la_empresa",
     *      tags={"activos_de_la_empresa"},
     *      description="Get activos_de_la_empresa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of activos_de_la_empresa",
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
     *                  ref="#/definitions/activos_de_la_empresa"
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
        /** @var activos_de_la_empresa $activosDeLaEmpresa */
        $activosDeLaEmpresa = $this->activosDeLaEmpresaRepository->find($id);

        if (empty($activosDeLaEmpresa)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/activosDeLaEmpresas.singular')])
            );
        }

        return $this->sendResponse(
            $activosDeLaEmpresa->toArray(),
            __('messages.retrieved', ['model' => __('models/activosDeLaEmpresas.singular')])
        );
    }

    /**
     * @param int $id
     * @param Updateactivos_de_la_empresaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/activosDeLaEmpresas/{id}",
     *      summary="Update the specified activos_de_la_empresa in storage",
     *      tags={"activos_de_la_empresa"},
     *      description="Update activos_de_la_empresa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of activos_de_la_empresa",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="activos_de_la_empresa that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/activos_de_la_empresa")
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
     *                  ref="#/definitions/activos_de_la_empresa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateactivos_de_la_empresaAPIRequest $request)
    {
        $input = $request->all();

        /** @var activos_de_la_empresa $activosDeLaEmpresa */
        $activosDeLaEmpresa = $this->activosDeLaEmpresaRepository->find($id);

        if (empty($activosDeLaEmpresa)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/activosDeLaEmpresas.singular')])
            );
        }

        $activosDeLaEmpresa = $this->activosDeLaEmpresaRepository->update($input, $id);

        return $this->sendResponse(
            $activosDeLaEmpresa->toArray(),
            __('messages.updated', ['model' => __('models/activosDeLaEmpresas.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/activosDeLaEmpresas/{id}",
     *      summary="Remove the specified activos_de_la_empresa from storage",
     *      tags={"activos_de_la_empresa"},
     *      description="Delete activos_de_la_empresa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of activos_de_la_empresa",
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
        /** @var activos_de_la_empresa $activosDeLaEmpresa */
        $activosDeLaEmpresa = $this->activosDeLaEmpresaRepository->find($id);

        if (empty($activosDeLaEmpresa)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/activosDeLaEmpresas.singular')])
            );
        }

        $activosDeLaEmpresa->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/activosDeLaEmpresas.singular')])
        );
    }
}
