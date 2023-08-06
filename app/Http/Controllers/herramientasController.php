<?php

namespace App\Http\Controllers;

use App\DataTables\herramientasDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateherramientasRequest;
use App\Http\Requests\UpdateherramientasRequest;
use App\Repositories\herramientasRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class herramientasController extends AppBaseController
{
    /** @var  herramientasRepository */
    private $herramientasRepository;

    public function __construct(herramientasRepository $herramientasRepo)
    {
        $this->herramientasRepository = $herramientasRepo;
    }

    /**
     * Display a listing of the herramientas.
     *
     * @param herramientasDataTable $herramientasDataTable
     * @return Response
     */
    public function index(herramientasDataTable $herramientasDataTable)
    {
        return $herramientasDataTable->render('herramientas.index');
    }

    /**
     * Show the form for creating a new herramientas.
     *
     * @return Response
     */
    public function create()
    {
        return view('herramientas.create');
    }

    /**
     * Store a newly created herramientas in storage.
     *
     * @param CreateherramientasRequest $request
     *
     * @return Response
     */
    public function store(CreateherramientasRequest $request)
    {
        $input = $request->all();

        $herramientas = $this->herramientasRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/herramientas.singular')]));

        return redirect(route('herramientas.index'));
    }

    /**
     * Display the specified herramientas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $herramientas = $this->herramientasRepository->find($id);

        if (empty($herramientas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/herramientas.singular')]));

            return redirect(route('herramientas.index'));
        }

        return view('herramientas.show')->with('herramientas', $herramientas);
    }

    /**
     * Show the form for editing the specified herramientas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $herramientas = $this->herramientasRepository->find($id);

        if (empty($herramientas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/herramientas.singular')]));

            return redirect(route('herramientas.index'));
        }

        return view('herramientas.edit')->with('herramientas', $herramientas);
    }

    /**
     * Update the specified herramientas in storage.
     *
     * @param  int              $id
     * @param UpdateherramientasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateherramientasRequest $request)
    {
        $herramientas = $this->herramientasRepository->find($id);

        if (empty($herramientas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/herramientas.singular')]));

            return redirect(route('herramientas.index'));
        }

        $herramientas = $this->herramientasRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/herramientas.singular')]));

        return redirect(route('herramientas.index'));
    }

    /**
     * Remove the specified herramientas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $herramientas = $this->herramientasRepository->find($id);

        if (empty($herramientas)) {
            Flash::error(__('messages.not_found', ['model' => __('models/herramientas.singular')]));

            return redirect(route('herramientas.index'));
        }

        $this->herramientasRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/herramientas.singular')]));

        return redirect(route('herramientas.index'));
    }
}
