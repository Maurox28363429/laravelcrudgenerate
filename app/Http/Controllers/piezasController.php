<?php

namespace App\Http\Controllers;

use App\DataTables\piezasDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatepiezasRequest;
use App\Http\Requests\UpdatepiezasRequest;
use App\Repositories\piezasRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class piezasController extends AppBaseController
{
    /** @var  piezasRepository */
    private $piezasRepository;

    public function __construct(piezasRepository $piezasRepo)
    {
        $this->piezasRepository = $piezasRepo;
    }

    /**
     * Display a listing of the piezas.
     *
     * @param piezasDataTable $piezasDataTable
     * @return Response
     */
    public function index(piezasDataTable $piezasDataTable)
    {
        return $piezasDataTable->render('piezas.index');
    }

    /**
     * Show the form for creating a new piezas.
     *
     * @return Response
     */
    public function create()
    {
        return view('piezas.create');
    }

    /**
     * Store a newly created piezas in storage.
     *
     * @param CreatepiezasRequest $request
     *
     * @return Response
     */
    public function store(CreatepiezasRequest $request)
    {
        $input = $request->all();

        $piezas = $this->piezasRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/piezas.singular')]));

        return redirect(route('piezas.index'));
    }

    /**
     * Display the specified piezas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $piezas = $this->piezasRepository->find($id);

        if (empty($piezas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/piezas.singular')]));

            return redirect(route('piezas.index'));
        }

        return view('piezas.show')->with('piezas', $piezas);
    }

    /**
     * Show the form for editing the specified piezas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $piezas = $this->piezasRepository->find($id);

        if (empty($piezas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/piezas.singular')]));

            return redirect(route('piezas.index'));
        }

        return view('piezas.edit')->with('piezas', $piezas);
    }

    /**
     * Update the specified piezas in storage.
     *
     * @param  int              $id
     * @param UpdatepiezasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepiezasRequest $request)
    {
        $piezas = $this->piezasRepository->find($id);

        if (empty($piezas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/piezas.singular')]));

            return redirect(route('piezas.index'));
        }

        $piezas = $this->piezasRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/piezas.singular')]));

        return redirect(route('piezas.index'));
    }

    /**
     * Remove the specified piezas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $piezas = $this->piezasRepository->find($id);

        if (empty($piezas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/piezas.singular')]));

            return redirect(route('piezas.index'));
        }

        $this->piezasRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/piezas.singular')]));

        return redirect(route('piezas.index'));
    }
}
