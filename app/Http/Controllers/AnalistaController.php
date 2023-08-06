<?php

namespace App\Http\Controllers;

use App\DataTables\AnalistaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAnalistaRequest;
use App\Http\Requests\UpdateAnalistaRequest;
use App\Repositories\AnalistaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AnalistaController extends AppBaseController
{
    /** @var  AnalistaRepository */
    private $analistaRepository;

    public function __construct(AnalistaRepository $analistaRepo)
    {
        $this->analistaRepository = $analistaRepo;
    }

    /**
     * Display a listing of the Analista.
     *
     * @param AnalistaDataTable $analistaDataTable
     * @return Response
     */
    public function index(AnalistaDataTable $analistaDataTable)
    {
        return $analistaDataTable->render('analistas.index');
    }

    /**
     * Show the form for creating a new Analista.
     *
     * @return Response
     */
    public function create()
    {
        return view('analistas.create');
    }

    /**
     * Store a newly created Analista in storage.
     *
     * @param CreateAnalistaRequest $request
     *
     * @return Response
     */
    public function store(CreateAnalistaRequest $request)
    {
        $input = $request->all();

        $analista = $this->analistaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/analistas.singular')]));

        return redirect(route('analistas.index'));
    }

    /**
     * Display the specified Analista.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $analista = $this->analistaRepository->find($id);

        if (empty($analista)) {
            Flash::error(__('messages.not_found', ['model' => __('models/analistas.singular')]));

            return redirect(route('analistas.index'));
        }

        return view('analistas.show')->with('analista', $analista);
    }

    /**
     * Show the form for editing the specified Analista.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $analista = $this->analistaRepository->find($id);

        if (empty($analista)) {
            Flash::error(__('messages.not_found', ['model' => __('models/analistas.singular')]));

            return redirect(route('analistas.index'));
        }

        return view('analistas.edit')->with('analista', $analista);
    }

    /**
     * Update the specified Analista in storage.
     *
     * @param  int              $id
     * @param UpdateAnalistaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnalistaRequest $request)
    {
        $analista = $this->analistaRepository->find($id);

        if (empty($analista)) {
            Flash::error(__('messages.not_found', ['model' => __('models/analistas.singular')]));

            return redirect(route('analistas.index'));
        }

        $analista = $this->analistaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/analistas.singular')]));

        return redirect(route('analistas.index'));
    }

    /**
     * Remove the specified Analista from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $analista = $this->analistaRepository->find($id);

        if (empty($analista)) {
            Flash::error(__('messages.not_found', ['model' => __('models/analistas.singular')]));

            return redirect(route('analistas.index'));
        }

        $this->analistaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/analistas.singular')]));

        return redirect(route('analistas.index'));
    }
}
