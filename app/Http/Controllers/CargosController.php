<?php

namespace App\Http\Controllers;

use App\DataTables\CargosDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCargosRequest;
use App\Http\Requests\UpdateCargosRequest;
use App\Repositories\CargosRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CargosController extends AppBaseController
{
    /** @var  CargosRepository */
    private $cargosRepository;

    public function __construct(CargosRepository $cargosRepo)
    {
        $this->cargosRepository = $cargosRepo;
    }

    /**
     * Display a listing of the Cargos.
     *
     * @param CargosDataTable $cargosDataTable
     * @return Response
     */
    public function index(CargosDataTable $cargosDataTable)
    {
        return $cargosDataTable->render('cargos.index');
    }

    /**
     * Show the form for creating a new Cargos.
     *
     * @return Response
     */
    public function create()
    {
        return view('cargos.create');
    }

    /**
     * Store a newly created Cargos in storage.
     *
     * @param CreateCargosRequest $request
     *
     * @return Response
     */
    public function store(CreateCargosRequest $request)
    {
        $input = $request->all();

        $cargos = $this->cargosRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/cargos.singular')]));

        return redirect(route('cargos.index'));
    }

    /**
     * Display the specified Cargos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cargos = $this->cargosRepository->find($id);

        if (empty($cargos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cargos.singular')]));

            return redirect(route('cargos.index'));
        }

        return view('cargos.show')->with('cargos', $cargos);
    }

    /**
     * Show the form for editing the specified Cargos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cargos = $this->cargosRepository->find($id);

        if (empty($cargos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cargos.singular')]));

            return redirect(route('cargos.index'));
        }

        return view('cargos.edit')->with('cargos', $cargos);
    }

    /**
     * Update the specified Cargos in storage.
     *
     * @param  int              $id
     * @param UpdateCargosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCargosRequest $request)
    {
        $cargos = $this->cargosRepository->find($id);

        if (empty($cargos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cargos.singular')]));

            return redirect(route('cargos.index'));
        }

        $cargos = $this->cargosRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/cargos.singular')]));

        return redirect(route('cargos.index'));
    }

    /**
     * Remove the specified Cargos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cargos = $this->cargosRepository->find($id);

        if (empty($cargos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cargos.singular')]));

            return redirect(route('cargos.index'));
        }

        $this->cargosRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/cargos.singular')]));

        return redirect(route('cargos.index'));
    }
}
