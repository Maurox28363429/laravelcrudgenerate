<?php

namespace App\Http\Controllers;

use App\DataTables\AsignarDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAsignarRequest;
use App\Http\Requests\UpdateAsignarRequest;
use App\Repositories\AsignarRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AsignarController extends AppBaseController
{
    /** @var  AsignarRepository */
    private $asignarRepository;

    public function __construct(AsignarRepository $asignarRepo)
    {
        $this->asignarRepository = $asignarRepo;
    }

    /**
     * Display a listing of the Asignar.
     *
     * @param AsignarDataTable $asignarDataTable
     * @return Response
     */
    public function index(AsignarDataTable $asignarDataTable)
    {
        return $asignarDataTable->render('asignars.index');
    }

    /**
     * Show the form for creating a new Asignar.
     *
     * @return Response
     */
    public function create()
    {
        return view('asignars.create');
    }

    /**
     * Store a newly created Asignar in storage.
     *
     * @param CreateAsignarRequest $request
     *
     * @return Response
     */
    public function store(CreateAsignarRequest $request)
    {
        $input = $request->all();

        $asignar = $this->asignarRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/asignars.singular')]));

        return redirect(route('asignars.index'));
    }

    /**
     * Display the specified Asignar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asignar = $this->asignarRepository->find($id);

        if (empty($asignar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/asignars.singular')]));

            return redirect(route('asignars.index'));
        }

        return view('asignars.show')->with('asignar', $asignar);
    }

    /**
     * Show the form for editing the specified Asignar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asignar = $this->asignarRepository->find($id);

        if (empty($asignar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/asignars.singular')]));

            return redirect(route('asignars.index'));
        }

        return view('asignars.edit')->with('asignar', $asignar);
    }

    /**
     * Update the specified Asignar in storage.
     *
     * @param  int              $id
     * @param UpdateAsignarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsignarRequest $request)
    {
        $asignar = $this->asignarRepository->find($id);

        if (empty($asignar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/asignars.singular')]));

            return redirect(route('asignars.index'));
        }

        $asignar = $this->asignarRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/asignars.singular')]));

        return redirect(route('asignars.index'));
    }

    /**
     * Remove the specified Asignar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asignar = $this->asignarRepository->find($id);

        if (empty($asignar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/asignars.singular')]));

            return redirect(route('asignars.index'));
        }

        $this->asignarRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/asignars.singular')]));

        return redirect(route('asignars.index'));
    }
}
