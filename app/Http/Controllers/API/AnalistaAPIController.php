<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnalistaAPIRequest;
use App\Http\Requests\API\UpdateAnalistaAPIRequest;
use App\Models\Analista;
use App\Repositories\AnalistaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AnalistaController
 * @package App\Http\Controllers\API
 */

class AnalistaAPIController extends AppBaseController
{
    /** @var  AnalistaRepository */
    private $analistaRepository;

    public function __construct(AnalistaRepository $analistaRepo)
    {
        $this->analistaRepository = $analistaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/analistas",
     *      summary="Get a listing of the Analistas.",
     *      tags={"Analista"},
     *      description="Get all Analistas",
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
     *                  @SWG\Items(ref="#/definitions/Analista")
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
        $analistas = $this->analistaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $analistas->toArray(),
            __('messages.retrieved', ['model' => __('models/analistas.plural')])
        );
    }

    /**
     * @param CreateAnalistaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/analistas",
     *      summary="Store a newly created Analista in storage",
     *      tags={"Analista"},
     *      description="Store Analista",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Analista that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Analista")
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
     *                  ref="#/definitions/Analista"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAnalistaAPIRequest $request)
    {
        $input = $request->all();

        $analista = $this->analistaRepository->create($input);

        return $this->sendResponse(
            $analista->toArray(),
            __('messages.saved', ['model' => __('models/analistas.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/analistas/{id}",
     *      summary="Display the specified Analista",
     *      tags={"Analista"},
     *      description="Get Analista",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Analista",
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
     *                  ref="#/definitions/Analista"
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
        /** @var Analista $analista */
        $analista = $this->analistaRepository->find($id);

        if (empty($analista)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/analistas.singular')])
            );
        }

        return $this->sendResponse(
            $analista->toArray(),
            __('messages.retrieved', ['model' => __('models/analistas.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateAnalistaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/analistas/{id}",
     *      summary="Update the specified Analista in storage",
     *      tags={"Analista"},
     *      description="Update Analista",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Analista",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Analista that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Analista")
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
     *                  ref="#/definitions/Analista"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAnalistaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Analista $analista */
        $analista = $this->analistaRepository->find($id);

        if (empty($analista)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/analistas.singular')])
            );
        }

        $analista = $this->analistaRepository->update($input, $id);

        return $this->sendResponse(
            $analista->toArray(),
            __('messages.updated', ['model' => __('models/analistas.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/analistas/{id}",
     *      summary="Remove the specified Analista from storage",
     *      tags={"Analista"},
     *      description="Delete Analista",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Analista",
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
        /** @var Analista $analista */
        $analista = $this->analistaRepository->find($id);

        if (empty($analista)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/analistas.singular')])
            );
        }

        $analista->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/analistas.singular')])
        );
    }
}
