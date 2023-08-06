<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createactivos_de_la_empresaRequest;
use App\Http\Requests\Updateactivos_de_la_empresaRequest;
use App\Repositories\activos_de_la_empresaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class activos_de_la_empresaController extends AppBaseController
{
    /** @var  activos_de_la_empresaRepository */
    private $activosDeLaEmpresaRepository;

    public function __construct(activos_de_la_empresaRepository $activosDeLaEmpresaRepo)
    {
        $this->activosDeLaEmpresaRepository = $activosDeLaEmpresaRepo;
    }

    /**
     * Display a listing of the activos_de_la_empresa.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $activosDeLaEmpresas = $this->activosDeLaEmpresaRepository->paginate(10);

        return view('activos_de_la_empresas.index')
            ->with('activosDeLaEmpresas', $activosDeLaEmpresas);
    }

    /**
     * Show the form for creating a new activos_de_la_empresa.
     *
     * @return Response
     */
    public function create()
    {
        return view('activos_de_la_empresas.create');
    }

    /**
     * Store a newly created activos_de_la_empresa in storage.
     *
     * @param Createactivos_de_la_empresaRequest $request
     *
     * @return Response
     */
    public function store(Createactivos_de_la_empresaRequest $request)
    {
        $input = $request->all();

        $activosDeLaEmpresa = $this->activosDeLaEmpresaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/activosDeLaEmpresas.singular')]));

        return redirect(route('activosDeLaEmpresas.index'));
    }

    /**
     * Display the specified activos_de_la_empresa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activosDeLaEmpresa = $this->activosDeLaEmpresaRepository->find($id);

        if (empty($activosDeLaEmpresa)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activosDeLaEmpresas.singular')]));

            return redirect(route('activosDeLaEmpresas.index'));
        }

        return view('activos_de_la_empresas.show')->with('activosDeLaEmpresa', $activosDeLaEmpresa);
    }

    /**
     * Show the form for editing the specified activos_de_la_empresa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activosDeLaEmpresa = $this->activosDeLaEmpresaRepository->find($id);

        if (empty($activosDeLaEmpresa)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activosDeLaEmpresas.singular')]));

            return redirect(route('activosDeLaEmpresas.index'));
        }

        return view('activos_de_la_empresas.edit')->with('activosDeLaEmpresa', $activosDeLaEmpresa);
    }

    /**
     * Update the specified activos_de_la_empresa in storage.
     *
     * @param int $id
     * @param Updateactivos_de_la_empresaRequest $request
     *
     * @return Response
     */
    public function update($id, Updateactivos_de_la_empresaRequest $request)
    {
        $activosDeLaEmpresa = $this->activosDeLaEmpresaRepository->find($id);

        if (empty($activosDeLaEmpresa)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activosDeLaEmpresas.singular')]));

            return redirect(route('activosDeLaEmpresas.index'));
        }

        $activosDeLaEmpresa = $this->activosDeLaEmpresaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/activosDeLaEmpresas.singular')]));

        return redirect(route('activosDeLaEmpresas.index'));
    }

    /**
     * Remove the specified activos_de_la_empresa from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activosDeLaEmpresa = $this->activosDeLaEmpresaRepository->find($id);

        if (empty($activosDeLaEmpresa)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activosDeLaEmpresas.singular')]));

            return redirect(route('activosDeLaEmpresas.index'));
        }

        $this->activosDeLaEmpresaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/activosDeLaEmpresas.singular')]));

        return redirect(route('activosDeLaEmpresas.index'));
    }
}
