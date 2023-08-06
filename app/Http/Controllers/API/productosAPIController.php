<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateproductosAPIRequest;
use App\Http\Requests\API\UpdateproductosAPIRequest;
use App\Models\productos;
use App\Repositories\productosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class productosController
 * @package App\Http\Controllers\API
 */

class productosAPIController extends AppBaseController
{
    /** @var  productosRepository */
    private $productosRepository;

    public function __construct(productosRepository $productosRepo)
    {
        $this->productosRepository = $productosRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/productos",
     *      summary="Get a listing of the productos.",
     *      tags={"productos"},
     *      description="Get all productos",
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
     *                  @SWG\Items(ref="#/definitions/productos")
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
        $productos = $this->productosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $productos->toArray(),
            __('messages.retrieved', ['model' => __('models/productos.plural')])
        );
    }

    /**
     * @param CreateproductosAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/productos",
     *      summary="Store a newly created productos in storage",
     *      tags={"productos"},
     *      description="Store productos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="productos that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/productos")
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
     *                  ref="#/definitions/productos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateproductosAPIRequest $request)
    {
        $input = $request->all();

        $productos = $this->productosRepository->create($input);

        return $this->sendResponse(
            $productos->toArray(),
            __('messages.saved', ['model' => __('models/productos.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/productos/{id}",
     *      summary="Display the specified productos",
     *      tags={"productos"},
     *      description="Get productos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of productos",
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
     *                  ref="#/definitions/productos"
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
        /** @var productos $productos */
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/productos.singular')])
            );
        }

        return $this->sendResponse(
            $productos->toArray(),
            __('messages.retrieved', ['model' => __('models/productos.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateproductosAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/productos/{id}",
     *      summary="Update the specified productos in storage",
     *      tags={"productos"},
     *      description="Update productos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of productos",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="productos that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/productos")
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
     *                  ref="#/definitions/productos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateproductosAPIRequest $request)
    {
        $input = $request->all();

        /** @var productos $productos */
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/productos.singular')])
            );
        }

        $productos = $this->productosRepository->update($input, $id);

        return $this->sendResponse(
            $productos->toArray(),
            __('messages.updated', ['model' => __('models/productos.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/productos/{id}",
     *      summary="Remove the specified productos from storage",
     *      tags={"productos"},
     *      description="Delete productos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of productos",
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
        /** @var productos $productos */
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/productos.singular')])
            );
        }

        $productos->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/productos.singular')])
        );
    }
}
