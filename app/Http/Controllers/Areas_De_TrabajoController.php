<?php

namespace App\Http\Controllers;

use App\DataTables\Areas_De_TrabajoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAreas_De_TrabajoRequest;
use App\Http\Requests\UpdateAreas_De_TrabajoRequest;
use App\Repositories\Areas_De_TrabajoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Areas_De_TrabajoController extends AppBaseController
{
    /** @var  Areas_De_TrabajoRepository */
    private $areasDeTrabajoRepository;

    public function __construct(Areas_De_TrabajoRepository $areasDeTrabajoRepo)
    {
        $this->areasDeTrabajoRepository = $areasDeTrabajoRepo;
    }

    /**
     * Display a listing of the Areas_De_Trabajo.
     *
     * @param Areas_De_TrabajoDataTable $areasDeTrabajoDataTable
     * @return Response
     */
    public function index(Areas_De_TrabajoDataTable $areasDeTrabajoDataTable)
    {
        return $areasDeTrabajoDataTable->render('areas__de__trabajos.index');
    }

    /**
     * Show the form for creating a new Areas_De_Trabajo.
     *
     * @return Response
     */
    public function create()
    {
        return view('areas__de__trabajos.create');
    }

    /**
     * Store a newly created Areas_De_Trabajo in storage.
     *
     * @param CreateAreas_De_TrabajoRequest $request
     *
     * @return Response
     */
    public function store(CreateAreas_De_TrabajoRequest $request)
    {
        $input = $request->all();

        $areasDeTrabajo = $this->areasDeTrabajoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/areasDeTrabajos.singular')]));

        return redirect(route('areasDeTrabajos.index'));
    }

    /**
     * Display the specified Areas_De_Trabajo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $areasDeTrabajo = $this->areasDeTrabajoRepository->find($id);

        if (empty($areasDeTrabajo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/areasDeTrabajos.singular')]));

            return redirect(route('areasDeTrabajos.index'));
        }

        return view('areas__de__trabajos.show')->with('areasDeTrabajo', $areasDeTrabajo);
    }

    /**
     * Show the form for editing the specified Areas_De_Trabajo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $areasDeTrabajo = $this->areasDeTrabajoRepository->find($id);

        if (empty($areasDeTrabajo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/areasDeTrabajos.singular')]));

            return redirect(route('areasDeTrabajos.index'));
        }

        return view('areas__de__trabajos.edit')->with('areasDeTrabajo', $areasDeTrabajo);
    }

    /**
     * Update the specified Areas_De_Trabajo in storage.
     *
     * @param  int              $id
     * @param UpdateAreas_De_TrabajoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAreas_De_TrabajoRequest $request)
    {
        $areasDeTrabajo = $this->areasDeTrabajoRepository->find($id);

        if (empty($areasDeTrabajo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/areasDeTrabajos.singular')]));

            return redirect(route('areasDeTrabajos.index'));
        }

        $areasDeTrabajo = $this->areasDeTrabajoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/areasDeTrabajos.singular')]));

        return redirect(route('areasDeTrabajos.index'));
    }

    /**
     * Remove the specified Areas_De_Trabajo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $areasDeTrabajo = $this->areasDeTrabajoRepository->find($id);

        if (empty($areasDeTrabajo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/areasDeTrabajos.singular')]));

            return redirect(route('areasDeTrabajos.index'));
        }

        $this->areasDeTrabajoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/areasDeTrabajos.singular')]));

        return redirect(route('areasDeTrabajos.index'));
    }
}
