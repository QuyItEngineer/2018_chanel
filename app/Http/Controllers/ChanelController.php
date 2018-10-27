<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChanelRequest;
use App\Http\Requests\UpdateChanelRequest;
use App\Repositories\ChanelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ChanelController extends AppBaseController
{
    /** @var  ChanelRepository */
    private $chanelRepository;

    public function __construct(ChanelRepository $chanelRepo)
    {
        $this->chanelRepository = $chanelRepo;
    }

    /**
     * Display a listing of the Chanel.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->chanelRepository->pushCriteria(new RequestCriteria($request));
        $chanels = $this->chanelRepository->all();

        return view('chanels.index')
            ->with('chanels', $chanels);
    }

    /**
     * Show the form for creating a new Chanel.
     *
     * @return Response
     */
    public function create()
    {
        return view('chanels.create');
    }

    /**
     * Store a newly created Chanel in storage.
     *
     * @param CreateChanelRequest $request
     *
     * @return Response
     */
    public function store(CreateChanelRequest $request)
    {
        $input = $request->all();

        $chanel = $this->chanelRepository->create($input);

        Flash::success('Chanel saved successfully.');

        return redirect(route('chanels.index'));
    }

    /**
     * Display the specified Chanel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $chanel = $this->chanelRepository->findWithoutFail($id);

        if (empty($chanel)) {
            Flash::error('Chanel not found');

            return redirect(route('chanels.index'));
        }

        return view('chanels.show')->with('chanel', $chanel);
    }

    /**
     * Show the form for editing the specified Chanel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $chanel = $this->chanelRepository->findWithoutFail($id);

        if (empty($chanel)) {
            Flash::error('Chanel not found');

            return redirect(route('chanels.index'));
        }

        return view('chanels.edit')->with('chanel', $chanel);
    }

    /**
     * Update the specified Chanel in storage.
     *
     * @param  int              $id
     * @param UpdateChanelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChanelRequest $request)
    {
        $chanel = $this->chanelRepository->findWithoutFail($id);

        if (empty($chanel)) {
            Flash::error('Chanel not found');

            return redirect(route('chanels.index'));
        }

        $chanel = $this->chanelRepository->update($request->all(), $id);

        Flash::success('Chanel updated successfully.');

        return redirect(route('chanels.index'));
    }

    /**
     * Remove the specified Chanel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $chanel = $this->chanelRepository->findWithoutFail($id);

        if (empty($chanel)) {
            Flash::error('Chanel not found');

            return redirect(route('chanels.index'));
        }

        $this->chanelRepository->delete($id);

        Flash::success('Chanel deleted successfully.');

        return redirect(route('chanels.index'));
    }
}
