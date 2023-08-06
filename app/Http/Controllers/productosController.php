<?php

namespace App\Http\Controllers;

use App\DataTables\productosDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateproductosRequest;
use App\Http\Requests\UpdateproductosRequest;
use App\Repositories\productosRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class productosController extends AppBaseController
{
    /** @var  productosRepository */
    private $productosRepository;

    public function __construct(productosRepository $productosRepo)
    {
        $this->productosRepository = $productosRepo;
    }

    /**
     * Display a listing of the productos.
     *
     * @param productosDataTable $productosDataTable
     * @return Response
     */
    public function index(productosDataTable $productosDataTable)
    {
        return $productosDataTable->render('productos.index');
    }

    /**
     * Show the form for creating a new productos.
     *
     * @return Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created productos in storage.
     *
     * @param CreateproductosRequest $request
     *
     * @return Response
     */
    public function store(CreateproductosRequest $request)
    {
        $input = $request->all();

        $productos = $this->productosRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/productos.singular')]));

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified productos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productos.singular')]));

            return redirect(route('productos.index'));
        }

        return view('productos.show')->with('productos', $productos);
    }

    /**
     * Show the form for editing the specified productos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productos.singular')]));

            return redirect(route('productos.index'));
        }

        return view('productos.edit')->with('productos', $productos);
    }

    /**
     * Update the specified productos in storage.
     *
     * @param  int              $id
     * @param UpdateproductosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproductosRequest $request)
    {
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productos.singular')]));

            return redirect(route('productos.index'));
        }

        $productos = $this->productosRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/productos.singular')]));

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified productos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productos = $this->productosRepository->find($id);

        if (empty($productos)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productos.singular')]));

            return redirect(route('productos.index'));
        }

        $this->productosRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/productos.singular')]));

        return redirect(route('productos.index'));
    }
}
