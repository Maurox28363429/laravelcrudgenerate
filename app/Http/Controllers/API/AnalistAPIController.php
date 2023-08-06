<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnalistAPIRequest;
use App\Http\Requests\API\UpdateAnalistAPIRequest;
use App\Models\Analist;
use App\Repositories\AnalistRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AnalistController
 * @package App\Http\Controllers\API
 */

class AnalistAPIController extends AppBaseController
{
    /** @var  AnalistRepository */
    private $analistRepository;

    public function __construct(AnalistRepository $analistRepo)
    {
        $this->analistRepository = $analistRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/analists",
     *      summary="Get a listing of the Analists.",
     *      tags={"Analist"},
     *      description="Get all Analists",
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
     *                  @SWG\Items(ref="#/definitions/Analist")
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
        $analists = $this->analistRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $analists->toArray(),
            __('messages.retrieved', ['model' => __('models/analists.plural')])
        );
    }

    /**
     * @param CreateAnalistAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/analists",
     *      summary="Store a newly created Analist in storage",
     *      tags={"Analist"},
     *      description="Store Analist",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Analist that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Analist")
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
     *                  ref="#/definitions/Analist"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAnalistAPIRequest $request)
    {
        $input = $request->all();

        $analist = $this->analistRepository->create($input);

        return $this->sendResponse(
            $analist->toArray(),
            __('messages.saved', ['model' => __('models/analists.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/analists/{id}",
     *      summary="Display the specified Analist",
     *      tags={"Analist"},
     *      description="Get Analist",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Analist",
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
     *                  ref="#/definitions/Analist"
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
        /** @var Analist $analist */
        $analist = $this->analistRepository->find($id);

        if (empty($analist)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/analists.singular')])
            );
        }

        return $this->sendResponse(
            $analist->toArray(),
            __('messages.retrieved', ['model' => __('models/analists.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateAnalistAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/analists/{id}",
     *      summary="Update the specified Analist in storage",
     *      tags={"Analist"},
     *      description="Update Analist",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Analist",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Analist that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Analist")
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
     *                  ref="#/definitions/Analist"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAnalistAPIRequest $request)
    {
        $input = $request->all();

        /** @var Analist $analist */
        $analist = $this->analistRepository->find($id);

        if (empty($analist)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/analists.singular')])
            );
        }

        $analist = $this->analistRepository->update($input, $id);

        return $this->sendResponse(
            $analist->toArray(),
            __('messages.updated', ['model' => __('models/analists.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/analists/{id}",
     *      summary="Remove the specified Analist from storage",
     *      tags={"Analist"},
     *      description="Delete Analist",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Analist",
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
        /** @var Analist $analist */
        $analist = $this->analistRepository->find($id);

        if (empty($analist)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/analists.singular')])
            );
        }

        $analist->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/analists.singular')])
        );
    }
}
