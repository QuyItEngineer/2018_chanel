<?php

namespace App\Http\Controllers;

use App\Contracts\ChanelService;
use App\DataTables\ChanelDataTable;
use App\Http\Requests\CreateChanelRequest;
use App\Http\Requests\UpdateChanelRequest;
use App\Repositories\ChanelRepository;
use Flash;
use Illuminate\Http\Request;
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
     * @param ChanelDataTable $chanelDataTable
     * @return Response
     */
    public function index(ChanelDataTable $chanelDataTable)
    {
        return $chanelDataTable->render('chanels.index');
    }

    /**
     * Show the form for creating a new Chanel.
     *
     * @param $id
     * @return Response
     */
    public function create($id = null)
    {
        return view('chanels.create')->with('category_id', $id);
    }

    /**
     * Store a newly created Chanel in storage.
     *
     * @param CreateChanelRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateChanelRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['image'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['image']);
        }

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
     * @param  int $id
     * @param UpdateChanelRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateChanelRequest $request)
    {
        $chanel = $this->chanelRepository->findWithoutFail($id);

        if (empty($chanel)) {
            Flash::error('Chanel not found');

            return redirect(route('chanels.index'));
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['image'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['image']);
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

        try {
            $this->chanelRepository->delete($id);
        }
        catch (\Exception $exception) {
            \Log::info("Error db Delete Channel: " . $exception->getMessage());
        }

        Flash::success('Chanel deleted successfully.');

        return redirect(route('chanels.index'));
    }
}
