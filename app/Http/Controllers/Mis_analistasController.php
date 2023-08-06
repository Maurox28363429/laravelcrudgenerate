<?php

namespace App\Http\Controllers;

use App\DataTables\Mis_analistasDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMis_analistasRequest;
use App\Http\Requests\UpdateMis_analistasRequest;
use App\Repositories\Mis_analistasRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Mis_analistasController extends AppBaseController
{
    /** @var  Mis_analistasRepository */
    private $misAnalistasRepository;

    public function __construct(Mis_analistasRepository $misAnalistasRepo)
    {
        $this->misAnalistasRepository = $misAnalistasRepo;
    }

    /**
     * Display a listing of the Mis_analistas.
     *
     * @param Mis_analistasDataTable $misAnalistasDataTable
     * @return Response
     */
    public function index(Mis_analistasDataTable $misAnalistasDataTable)
    {
        return $misAnalistasDataTable->render('mis_analistas.index');
    }

    /**
     * Show the form for creating a new Mis_analistas.
     *
     * @return Response
     */
    public function create()
    {
        return view('mis_analistas.create');
    }

    /**
     * Store a newly created Mis_analistas in storage.
     *
     * @param CreateMis_analistasRequest $request
     *
     * @return Response
     */
    public function store(CreateMis_analistasRequest $request)
    {
        $input = $request->all();

        $misAnalistas = $this->misAnalistasRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/misAnalistas.singular')]));

        return redirect(route('misAnalistas.index'));
    }

    /**
     * Display the specified Mis_analistas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $misAnalistas = $this->misAnalistasRepository->find($id);

        if (empty($misAnalistas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/misAnalistas.singular')]));

            return redirect(route('misAnalistas.index'));
        }

        return view('mis_analistas.show')->with('misAnalistas', $misAnalistas);
    }

    /**
     * Show the form for editing the specified Mis_analistas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $misAnalistas = $this->misAnalistasRepository->find($id);

        if (empty($misAnalistas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/misAnalistas.singular')]));

            return redirect(route('misAnalistas.index'));
        }

        return view('mis_analistas.edit')->with('misAnalistas', $misAnalistas);
    }

    /**
     * Update the specified Mis_analistas in storage.
     *
     * @param  int              $id
     * @param UpdateMis_analistasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMis_analistasRequest $request)
    {
        $misAnalistas = $this->misAnalistasRepository->find($id);

        if (empty($misAnalistas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/misAnalistas.singular')]));

            return redirect(route('misAnalistas.index'));
        }

        $misAnalistas = $this->misAnalistasRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/misAnalistas.singular')]));

        return redirect(route('misAnalistas.index'));
    }

    /**
     * Remove the specified Mis_analistas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $misAnalistas = $this->misAnalistasRepository->find($id);

        if (empty($misAnalistas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/misAnalistas.singular')]));

            return redirect(route('misAnalistas.index'));
        }

        $this->misAnalistasRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/misAnalistas.singular')]));

        return redirect(route('misAnalistas.index'));
    }
}
