<?php

namespace App\Http\Controllers;

use App\DataTables\Equipo1DataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEquipo1Request;
use App\Http\Requests\UpdateEquipo1Request;
use App\Repositories\Equipo1Repository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Equipo1;
class Equipo1Controller extends AppBaseController
{
    /** @var  Equipo1Repository */
    private $equipo1Repository;

    public function __construct(Equipo1Repository $equipo1Repo)
    {
        $this->equipo1Repository = $equipo1Repo;
    }

    /**
     * Display a listing of the Equipo1.
     *
     * @param Equipo1DataTable $equipo1DataTable
     * @return Response
     */
    public function index(Equipo1DataTable $equipo1DataTable)
    {
        return $equipo1DataTable->render('equipo1s.index');
    }

    /**
     * Show the form for creating a new Equipo1.
     *
     * @return Response
     */
    public function create()
    {
        return view('equipo1s.create');
    }

    /**
     * Store a newly created Equipo1 in storage.
     *
     * @param CreateEquipo1Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $equipo1 = $this->equipo1Repository->create([
            'nombre' => $input['nombre'],
            'piezas'=> json_encode($input['piezas'])
        ]);

        Flash::success(__('messages.saved', ['model' => __('models/equipo1s.singular')]));

        return redirect(route('equipo1s.index'));
    }

    /**
     * Display the specified Equipo1.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipo1 = $this->equipo1Repository->find($id);

        if (empty($equipo1)) {
            Flash::error(__('messages.not_found', ['model' => __('models/equipo1s.singular')]));

            return redirect(route('equipo1s.index'));
        }

        return view('equipo1s.show')->with('equipo1', $equipo1);
    }

    /**
     * Show the form for editing the specified Equipo1.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipo1 = $this->equipo1Repository->find($id);

        if (empty($equipo1)) {
            Flash::error(__('messages.not_found', ['model' => __('models/equipo1s.singular')]));

            return redirect(route('equipo1s.index'));
        }

        return view('equipo1s.edit')->with('equipo1', $equipo1);
    }

    /**
     * Update the specified Equipo1 in storage.
     *
     * @param  int              $id
     * @param UpdateEquipo1Request $request
     *
     * @return Response
     */
    public function update($id, UpdateEquipo1Request $request)
    {
        $equipo1 = $this->equipo1Repository->find($id);

        if (empty($equipo1)) {
            Flash::error(__('messages.not_found', ['model' => __('models/equipo1s.singular')]));

            return redirect(route('equipo1s.index'));
        }

        $equipo1 = $this->equipo1Repository->update([
            'nombre' => $request->nombre,
            'piezas'=> json_encode($request->piezas)
        ], $id);

        Flash::success(__('messages.updated', ['model' => __('models/equipo1s.singular')]));

        return redirect(route('equipo1s.index'));
    }

    /**
     * Remove the specified Equipo1 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipo1 = $this->equipo1Repository->find($id);

        if (empty($equipo1)) {
            Flash::error(__('messages.not_found', ['model' => __('models/equipo1s.singular')]));

            return redirect(route('equipo1s.index'));
        }

        $this->equipo1Repository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/equipo1s.singular')]));

        return redirect(route('equipo1s.index'));
    }
}
