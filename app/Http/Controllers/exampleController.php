<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateexampleRequest;
use App\Http\Requests\UpdateexampleRequest;
use App\Repositories\exampleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class exampleController extends AppBaseController
{
    /** @var  exampleRepository */
    private $exampleRepository;

    public function __construct(exampleRepository $exampleRepo)
    {
        $this->exampleRepository = $exampleRepo;
    }

    /**
     * Display a listing of the example.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $examples = $this->exampleRepository->paginate(10);

        return view('examples.index')
            ->with('examples', $examples);
    }

    /**
     * Show the form for creating a new example.
     *
     * @return Response
     */
    public function create()
    {
        return view('examples.create');
    }

    /**
     * Store a newly created example in storage.
     *
     * @param CreateexampleRequest $request
     *
     * @return Response
     */
    public function store(CreateexampleRequest $request)
    {
        $input = $request->all();

        $example = $this->exampleRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/examples.singular')]));

        return redirect(route('examples.index'));
    }

    /**
     * Display the specified example.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $example = $this->exampleRepository->find($id);

        if (empty($example)) {
            Flash::error(__('messages.not_found', ['model' => __('models/examples.singular')]));

            return redirect(route('examples.index'));
        }

        return view('examples.show')->with('example', $example);
    }

    /**
     * Show the form for editing the specified example.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $example = $this->exampleRepository->find($id);

        if (empty($example)) {
            Flash::error(__('messages.not_found', ['model' => __('models/examples.singular')]));

            return redirect(route('examples.index'));
        }

        return view('examples.edit')->with('example', $example);
    }

    /**
     * Update the specified example in storage.
     *
     * @param int $id
     * @param UpdateexampleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateexampleRequest $request)
    {
        $example = $this->exampleRepository->find($id);

        if (empty($example)) {
            Flash::error(__('messages.not_found', ['model' => __('models/examples.singular')]));

            return redirect(route('examples.index'));
        }

        $example = $this->exampleRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/examples.singular')]));

        return redirect(route('examples.index'));
    }

    /**
     * Remove the specified example from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $example = $this->exampleRepository->find($id);

        if (empty($example)) {
            Flash::error(__('messages.not_found', ['model' => __('models/examples.singular')]));

            return redirect(route('examples.index'));
        }

        $this->exampleRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/examples.singular')]));

        return redirect(route('examples.index'));
    }
}
