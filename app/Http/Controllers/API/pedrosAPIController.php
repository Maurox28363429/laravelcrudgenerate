<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepedrosAPIRequest;
use App\Http\Requests\API\UpdatepedrosAPIRequest;
use App\Models\pedros;
use App\Repositories\pedrosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class pedrosController
 * @package App\Http\Controllers\API
 */

class pedrosAPIController extends AppBaseController
{
    /** @var  pedrosRepository */
    private $pedrosRepository;

    public function __construct(pedrosRepository $pedrosRepo)
    {
        $this->pedrosRepository = $pedrosRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/pedros",
     *      summary="Get a listing of the pedros.",
     *      tags={"pedros"},
     *      description="Get all pedros",
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
     *                  @SWG\Items(ref="#/definitions/pedros")
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
        $pedros = $this->pedrosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $pedros->toArray(),
            __('messages.retrieved', ['model' => __('models/pedros.plural')])
        );
    }

    /**
     * @param CreatepedrosAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/pedros",
     *      summary="Store a newly created pedros in storage",
     *      tags={"pedros"},
     *      description="Store pedros",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="pedros that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/pedros")
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
     *                  ref="#/definitions/pedros"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatepedrosAPIRequest $request)
    {
        $input = $request->all();

        $pedros = $this->pedrosRepository->create($input);

        return $this->sendResponse(
            $pedros->toArray(),
            __('messages.saved', ['model' => __('models/pedros.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/pedros/{id}",
     *      summary="Display the specified pedros",
     *      tags={"pedros"},
     *      description="Get pedros",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pedros",
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
     *                  ref="#/definitions/pedros"
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
        /** @var pedros $pedros */
        $pedros = $this->pedrosRepository->find($id);

        if (empty($pedros)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/pedros.singular')])
            );
        }

        return $this->sendResponse(
            $pedros->toArray(),
            __('messages.retrieved', ['model' => __('models/pedros.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdatepedrosAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/pedros/{id}",
     *      summary="Update the specified pedros in storage",
     *      tags={"pedros"},
     *      description="Update pedros",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pedros",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="pedros that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/pedros")
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
     *                  ref="#/definitions/pedros"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatepedrosAPIRequest $request)
    {
        $input = $request->all();

        /** @var pedros $pedros */
        $pedros = $this->pedrosRepository->find($id);

        if (empty($pedros)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/pedros.singular')])
            );
        }

        $pedros = $this->pedrosRepository->update($input, $id);

        return $this->sendResponse(
            $pedros->toArray(),
            __('messages.updated', ['model' => __('models/pedros.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/pedros/{id}",
     *      summary="Remove the specified pedros from storage",
     *      tags={"pedros"},
     *      description="Delete pedros",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pedros",
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
        /** @var pedros $pedros */
        $pedros = $this->pedrosRepository->find($id);

        if (empty($pedros)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/pedros.singular')])
            );
        }

        $pedros->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/pedros.singular')])
        );
    }
}
