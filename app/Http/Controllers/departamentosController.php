<?php

namespace App\Http\Controllers;

use App\DataTables\departamentosDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatedepartamentosRequest;
use App\Http\Requests\UpdatedepartamentosRequest;
use App\Repositories\departamentosRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class departamentosController extends AppBaseController
{
    /** @var  departamentosRepository */
    private $departamentosRepository;

    public function __construct(departamentosRepository $departamentosRepo)
    {
        $this->departamentosRepository = $departamentosRepo;
    }

    /**
     * Display a listing of the departamentos.
     *
     * @param departamentosDataTable $departamentosDataTable
     * @return Response
     */
    public function index(departamentosDataTable $departamentosDataTable)
    {
        return $departamentosDataTable->render('departamentos.index');
    }

    /**
     * Show the form for creating a new departamentos.
     *
     * @return Response
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created departamentos in storage.
     *
     * @param CreatedepartamentosRequest $request
     *
     * @return Response
     */
    public function store(CreatedepartamentosRequest $request)
    {
        $input = $request->all();

        $departamentos = $this->departamentosRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/departamentos.singular')]));

        return redirect(route('departamentos.index'));
    }

    /**
     * Display the specified departamentos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/departamentos.singular')]));

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.show')->with('departamentos', $departamentos);
    }

    /**
     * Show the form for editing the specified departamentos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/departamentos.singular')]));

            return redirect(route('departamentos.index'));
        }

        return view('departamentos.edit')->with('departamentos', $departamentos);
    }

    /**
     * Update the specified departamentos in storage.
     *
     * @param  int              $id
     * @param UpdatedepartamentosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedepartamentosRequest $request)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/departamentos.singular')]));

            return redirect(route('departamentos.index'));
        }

        $departamentos = $this->departamentosRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/departamentos.singular')]));

        return redirect(route('departamentos.index'));
    }

    /**
     * Remove the specified departamentos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $departamentos = $this->departamentosRepository->find($id);

        if (empty($departamentos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/departamentos.singular')]));

            return redirect(route('departamentos.index'));
        }

        $this->departamentosRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/departamentos.singular')]));

        return redirect(route('departamentos.index'));
    }
}
