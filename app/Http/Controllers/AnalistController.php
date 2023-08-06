<?php

namespace App\Http\Controllers;

use App\DataTables\AnalistDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAnalistRequest;
use App\Http\Requests\UpdateAnalistRequest;
use App\Repositories\AnalistRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AnalistController extends AppBaseController
{
    /** @var  AnalistRepository */
    private $analistRepository;

    public function __construct(AnalistRepository $analistRepo)
    {
        $this->analistRepository = $analistRepo;
    }

    /**
     * Display a listing of the Analist.
     *
     * @param AnalistDataTable $analistDataTable
     * @return Response
     */
    public function index(AnalistDataTable $analistDataTable)
    {
        return $analistDataTable->render('analists.index');
    }

    /**
     * Show the form for creating a new Analist.
     *
     * @return Response
     */
    public function create()
    {
        return view('analists.create');
    }

    /**
     * Store a newly created Analist in storage.
     *
     * @param CreateAnalistRequest $request
     *
     * @return Response
     */
    public function store(CreateAnalistRequest $request)
    {
        $input = $request->all();

        $analist = $this->analistRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/analists.singular')]));

        return redirect(route('analists.index'));
    }

    /**
     * Display the specified Analist.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $analist = $this->analistRepository->find($id);

        if (empty($analist)) {
            Flash::error(__('messages.not_found', ['model' => __('models/analists.singular')]));

            return redirect(route('analists.index'));
        }

        return view('analists.show')->with('analist', $analist);
    }

    /**
     * Show the form for editing the specified Analist.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $analist = $this->analistRepository->find($id);

        if (empty($analist)) {
            Flash::error(__('messages.not_found', ['model' => __('models/analists.singular')]));

            return redirect(route('analists.index'));
        }

        return view('analists.edit')->with('analist', $analist);
    }

    /**
     * Update the specified Analist in storage.
     *
     * @param  int              $id
     * @param UpdateAnalistRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnalistRequest $request)
    {
        $analist = $this->analistRepository->find($id);

        if (empty($analist)) {
            Flash::error(__('messages.not_found', ['model' => __('models/analists.singular')]));

            return redirect(route('analists.index'));
        }

        $analist = $this->analistRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/analists.singular')]));

        return redirect(route('analists.index'));
    }

    /**
     * Remove the specified Analist from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $analist = $this->analistRepository->find($id);

        if (empty($analist)) {
            Flash::error(__('messages.not_found', ['model' => __('models/analists.singular')]));

            return redirect(route('analists.index'));
        }

        $this->analistRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/analists.singular')]));

        return redirect(route('analists.index'));
    }
}
