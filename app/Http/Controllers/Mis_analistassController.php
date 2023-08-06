<?php

namespace App\Http\Controllers;

use App\DataTables\Mis_analistassDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMis_analistassRequest;
use App\Http\Requests\UpdateMis_analistassRequest;
use App\Repositories\Mis_analistassRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Mis_analistassController extends AppBaseController
{
    /** @var  Mis_analistassRepository */
    private $misAnalistassRepository;

    public function __construct(Mis_analistassRepository $misAnalistassRepo)
    {
        $this->misAnalistassRepository = $misAnalistassRepo;
    }

    /**
     * Display a listing of the Mis_analistass.
     *
     * @param Mis_analistassDataTable $misAnalistassDataTable
     * @return Response
     */
    public function index(Mis_analistassDataTable $misAnalistassDataTable)
    {
        return $misAnalistassDataTable->render('mis_analistasses.index');
    }

    /**
     * Show the form for creating a new Mis_analistass.
     *
     * @return Response
     */
    public function create()
    {
        return view('mis_analistasses.create');
    }

    /**
     * Store a newly created Mis_analistass in storage.
     *
     * @param CreateMis_analistassRequest $request
     *
     * @return Response
     */
    public function store(CreateMis_analistassRequest $request)
    {
        $input = $request->all();

        $misAnalistass = $this->misAnalistassRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/misAnalistasses.singular')]));

        return redirect(route('misAnalistasses.index'));
    }

    /**
     * Display the specified Mis_analistass.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $misAnalistass = $this->misAnalistassRepository->find($id);

        if (empty($misAnalistass)) {
            Flash::error(__('messages.not_found', ['model' => __('models/misAnalistasses.singular')]));

            return redirect(route('misAnalistasses.index'));
        }

        return view('mis_analistasses.show')->with('misAnalistass', $misAnalistass);
    }

    /**
     * Show the form for editing the specified Mis_analistass.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $misAnalistass = $this->misAnalistassRepository->find($id);

        if (empty($misAnalistass)) {
            Flash::error(__('messages.not_found', ['model' => __('models/misAnalistasses.singular')]));

            return redirect(route('misAnalistasses.index'));
        }

        return view('mis_analistasses.edit')->with('misAnalistass', $misAnalistass);
    }

    /**
     * Update the specified Mis_analistass in storage.
     *
     * @param  int              $id
     * @param UpdateMis_analistassRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMis_analistassRequest $request)
    {
        $misAnalistass = $this->misAnalistassRepository->find($id);

        if (empty($misAnalistass)) {
            Flash::error(__('messages.not_found', ['model' => __('models/misAnalistasses.singular')]));

            return redirect(route('misAnalistasses.index'));
        }

        $misAnalistass = $this->misAnalistassRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/misAnalistasses.singular')]));

        return redirect(route('misAnalistasses.index'));
    }

    /**
     * Remove the specified Mis_analistass from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $misAnalistass = $this->misAnalistassRepository->find($id);

        if (empty($misAnalistass)) {
            Flash::error(__('messages.not_found', ['model' => __('models/misAnalistasses.singular')]));

            return redirect(route('misAnalistasses.index'));
        }

        $this->misAnalistassRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/misAnalistasses.singular')]));

        return redirect(route('misAnalistasses.index'));
    }
}
