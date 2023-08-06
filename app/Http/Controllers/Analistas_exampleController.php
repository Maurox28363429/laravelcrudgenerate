<?php

namespace App\Http\Controllers;

use App\DataTables\Analistas_exampleDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAnalistas_exampleRequest;
use App\Http\Requests\UpdateAnalistas_exampleRequest;
use App\Repositories\Analistas_exampleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Analistas_exampleController extends AppBaseController
{
    /** @var  Analistas_exampleRepository */
    private $analistasExampleRepository;

    public function __construct(Analistas_exampleRepository $analistasExampleRepo)
    {
        $this->analistasExampleRepository = $analistasExampleRepo;
    }

    /**
     * Display a listing of the Analistas_example.
     *
     * @param Analistas_exampleDataTable $analistasExampleDataTable
     * @return Response
     */
    public function index(Analistas_exampleDataTable $analistasExampleDataTable)
    {
        return $analistasExampleDataTable->render('analistas_examples.index');
    }

    /**
     * Show the form for creating a new Analistas_example.
     *
     * @return Response
     */
    public function create()
    {
        return view('analistas_examples.create');
    }

    /**
     * Store a newly created Analistas_example in storage.
     *
     * @param CreateAnalistas_exampleRequest $request
     *
     * @return Response
     */
    public function store(CreateAnalistas_exampleRequest $request)
    {
        $input = $request->all();

        $analistasExample = $this->analistasExampleRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/analistasExamples.singular')]));

        return redirect(route('analistasExamples.index'));
    }

    /**
     * Display the specified Analistas_example.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $analistasExample = $this->analistasExampleRepository->find($id);

        if (empty($analistasExample)) {
            Flash::error(__('messages.not_found', ['model' => __('models/analistasExamples.singular')]));

            return redirect(route('analistasExamples.index'));
        }

        return view('analistas_examples.show')->with('analistasExample', $analistasExample);
    }

    /**
     * Show the form for editing the specified Analistas_example.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $analistasExample = $this->analistasExampleRepository->find($id);

        if (empty($analistasExample)) {
            Flash::error(__('messages.not_found', ['model' => __('models/analistasExamples.singular')]));

            return redirect(route('analistasExamples.index'));
        }

        return view('analistas_examples.edit')->with('analistasExample', $analistasExample);
    }

    /**
     * Update the specified Analistas_example in storage.
     *
     * @param  int              $id
     * @param UpdateAnalistas_exampleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnalistas_exampleRequest $request)
    {
        $analistasExample = $this->analistasExampleRepository->find($id);

        if (empty($analistasExample)) {
            Flash::error(__('messages.not_found', ['model' => __('models/analistasExamples.singular')]));

            return redirect(route('analistasExamples.index'));
        }

        $analistasExample = $this->analistasExampleRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/analistasExamples.singular')]));

        return redirect(route('analistasExamples.index'));
    }

    /**
     * Remove the specified Analistas_example from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $analistasExample = $this->analistasExampleRepository->find($id);

        if (empty($analistasExample)) {
            Flash::error(__('messages.not_found', ['model' => __('models/analistasExamples.singular')]));

            return redirect(route('analistasExamples.index'));
        }

        $this->analistasExampleRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/analistasExamples.singular')]));

        return redirect(route('analistasExamples.index'));
    }
}
