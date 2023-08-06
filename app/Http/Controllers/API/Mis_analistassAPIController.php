<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMis_analistassAPIRequest;
use App\Http\Requests\API\UpdateMis_analistassAPIRequest;
use App\Models\Mis_analistass;
use App\Repositories\Mis_analistassRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Mis_analistassController
 * @package App\Http\Controllers\API
 */

class Mis_analistassAPIController extends AppBaseController
{
    /** @var  Mis_analistassRepository */
    private $misAnalistassRepository;

    public function __construct(Mis_analistassRepository $misAnalistassRepo)
    {
        $this->misAnalistassRepository = $misAnalistassRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/misAnalistasses",
     *      summary="Get a listing of the Mis_analistasses.",
     *      tags={"Mis_analistass"},
     *      description="Get all Mis_analistasses",
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
     *                  @SWG\Items(ref="#/definitions/Mis_analistass")
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
        $misAnalistasses = $this->misAnalistassRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $misAnalistasses->toArray(),
            __('messages.retrieved', ['model' => __('models/misAnalistasses.plural')])
        );
    }

    /**
     * @param CreateMis_analistassAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/misAnalistasses",
     *      summary="Store a newly created Mis_analistass in storage",
     *      tags={"Mis_analistass"},
     *      description="Store Mis_analistass",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Mis_analistass that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Mis_analistass")
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
     *                  ref="#/definitions/Mis_analistass"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMis_analistassAPIRequest $request)
    {
        $input = $request->all();

        $misAnalistass = $this->misAnalistassRepository->create($input);

        return $this->sendResponse(
            $misAnalistass->toArray(),
            __('messages.saved', ['model' => __('models/misAnalistasses.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/misAnalistasses/{id}",
     *      summary="Display the specified Mis_analistass",
     *      tags={"Mis_analistass"},
     *      description="Get Mis_analistass",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Mis_analistass",
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
     *                  ref="#/definitions/Mis_analistass"
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
        /** @var Mis_analistass $misAnalistass */
        $misAnalistass = $this->misAnalistassRepository->find($id);

        if (empty($misAnalistass)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/misAnalistasses.singular')])
            );
        }

        return $this->sendResponse(
            $misAnalistass->toArray(),
            __('messages.retrieved', ['model' => __('models/misAnalistasses.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateMis_analistassAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/misAnalistasses/{id}",
     *      summary="Update the specified Mis_analistass in storage",
     *      tags={"Mis_analistass"},
     *      description="Update Mis_analistass",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Mis_analistass",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Mis_analistass that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Mis_analistass")
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
     *                  ref="#/definitions/Mis_analistass"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMis_analistassAPIRequest $request)
    {
        $input = $request->all();

        /** @var Mis_analistass $misAnalistass */
        $misAnalistass = $this->misAnalistassRepository->find($id);

        if (empty($misAnalistass)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/misAnalistasses.singular')])
            );
        }

        $misAnalistass = $this->misAnalistassRepository->update($input, $id);

        return $this->sendResponse(
            $misAnalistass->toArray(),
            __('messages.updated', ['model' => __('models/misAnalistasses.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/misAnalistasses/{id}",
     *      summary="Remove the specified Mis_analistass from storage",
     *      tags={"Mis_analistass"},
     *      description="Delete Mis_analistass",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Mis_analistass",
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
        /** @var Mis_analistass $misAnalistass */
        $misAnalistass = $this->misAnalistassRepository->find($id);

        if (empty($misAnalistass)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/misAnalistasses.singular')])
            );
        }

        $misAnalistass->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/misAnalistasses.singular')])
        );
    }
}
