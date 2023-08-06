<?php

namespace App\Http\Controllers;

use App\DataTables\pedrosDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatepedrosRequest;
use App\Http\Requests\UpdatepedrosRequest;
use App\Repositories\pedrosRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class pedrosController extends AppBaseController
{
    /** @var  pedrosRepository */
    private $pedrosRepository;

    public function __construct(pedrosRepository $pedrosRepo)
    {
        $this->pedrosRepository = $pedrosRepo;
    }

    /**
     * Display a listing of the pedros.
     *
     * @param pedrosDataTable $pedrosDataTable
     * @return Response
     */
    public function index(pedrosDataTable $pedrosDataTable)
    {
        return $pedrosDataTable->render('pedros.index');
    }

    /**
     * Show the form for creating a new pedros.
     *
     * @return Response
     */
    public function create()
    {
        return view('pedros.create');
    }

    /**
     * Store a newly created pedros in storage.
     *
     * @param CreatepedrosRequest $request
     *
     * @return Response
     */
    public function store(CreatepedrosRequest $request)
    {
        $input = $request->all();

        $pedros = $this->pedrosRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/pedros.singular')]));

        return redirect(route('pedros.index'));
    }

    /**
     * Display the specified pedros.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pedros = $this->pedrosRepository->find($id);

        if (empty($pedros)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pedros.singular')]));

            return redirect(route('pedros.index'));
        }

        return view('pedros.show')->with('pedros', $pedros);
    }

    /**
     * Show the form for editing the specified pedros.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pedros = $this->pedrosRepository->find($id);

        if (empty($pedros)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pedros.singular')]));

            return redirect(route('pedros.index'));
        }

        return view('pedros.edit')->with('pedros', $pedros);
    }

    /**
     * Update the specified pedros in storage.
     *
     * @param  int              $id
     * @param UpdatepedrosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepedrosRequest $request)
    {
        $pedros = $this->pedrosRepository->find($id);

        if (empty($pedros)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pedros.singular')]));

            return redirect(route('pedros.index'));
        }

        $pedros = $this->pedrosRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/pedros.singular')]));

        return redirect(route('pedros.index'));
    }

    /**
     * Remove the specified pedros from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pedros = $this->pedrosRepository->find($id);

        if (empty($pedros)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pedros.singular')]));

            return redirect(route('pedros.index'));
        }

        $this->pedrosRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/pedros.singular')]));

        return redirect(route('pedros.index'));
    }
}
