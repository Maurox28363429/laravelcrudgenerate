<?php

namespace App\Http\Controllers;

use App\DataTables\asistenciaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateasistenciaRequest;
use App\Http\Requests\UpdateasistenciaRequest;
use App\Repositories\asistenciaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class asistenciaController extends AppBaseController
{
    /** @var  asistenciaRepository */
    private $asistenciaRepository;

    public function __construct(asistenciaRepository $asistenciaRepo)
    {
        $this->asistenciaRepository = $asistenciaRepo;
    }

    /**
     * Display a listing of the asistencia.
     *
     * @param asistenciaDataTable $asistenciaDataTable
     * @return Response
     */
    public function index(asistenciaDataTable $asistenciaDataTable)
    {
        return $asistenciaDataTable->render('asistencias.index');
    }

    /**
     * Show the form for creating a new asistencia.
     *
     * @return Response
     */
    public function create()
    {
        return view('asistencias.create');
    }

    /**
     * Store a newly created asistencia in storage.
     *
     * @param CreateasistenciaRequest $request
     *
     * @return Response
     */
    public function store(CreateasistenciaRequest $request)
    {
        $input = $request->all();

        $asistencia = $this->asistenciaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/asistencias.singular')]));

        return redirect(route('asistencias.index'));
    }

    /**
     * Display the specified asistencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asistencia = $this->asistenciaRepository->find($id);

        if (empty($asistencia)) {
            Flash::error(__('messages.not_found', ['model' => __('models/asistencias.singular')]));

            return redirect(route('asistencias.index'));
        }

        return view('asistencias.show')->with('asistencia', $asistencia);
    }

    /**
     * Show the form for editing the specified asistencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asistencia = $this->asistenciaRepository->find($id);

        if (empty($asistencia)) {
            Flash::error(__('messages.not_found', ['model' => __('models/asistencias.singular')]));

            return redirect(route('asistencias.index'));
        }

        return view('asistencias.edit')->with('asistencia', $asistencia);
    }

    /**
     * Update the specified asistencia in storage.
     *
     * @param  int              $id
     * @param UpdateasistenciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateasistenciaRequest $request)
    {
        $asistencia = $this->asistenciaRepository->find($id);

        if (empty($asistencia)) {
            Flash::error(__('messages.not_found', ['model' => __('models/asistencias.singular')]));

            return redirect(route('asistencias.index'));
        }

        $asistencia = $this->asistenciaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/asistencias.singular')]));

        return redirect(route('asistencias.index'));
    }

    /**
     * Remove the specified asistencia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asistencia = $this->asistenciaRepository->find($id);

        if (empty($asistencia)) {
            Flash::error(__('messages.not_found', ['model' => __('models/asistencias.singular')]));

            return redirect(route('asistencias.index'));
        }

        $this->asistenciaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/asistencias.singular')]));

        return redirect(route('asistencias.index'));
    }
}
