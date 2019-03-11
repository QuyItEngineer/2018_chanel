<?php

namespace App\Http\Controllers;

use App\DataTables\SubCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Repositories\ChanelRepository;
use App\Repositories\SubCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class SubCategoryController extends AppBaseController
{
    /**
     * @var  SubCategoryRepository
     */
    private $subCategoryRepository;

    /**
     * @var ChanelRepository
     */
    private $chanelRepository;

    /**
     * SubCategoryController constructor.
     * @param SubCategoryRepository $subCategoryRepo
     * @param ChanelRepository $chanelRepository
     */
    public function __construct(SubCategoryRepository $subCategoryRepo, ChanelRepository $chanelRepository)
    {
        $this->subCategoryRepository = $subCategoryRepo;
        $this->chanelRepository = $chanelRepository;
    }

    /**
     * Display a listing of the SubCategory.
     *
     * @param SubCategoryDataTable $subCategoryDataTable
     * @return Response
     */
    public function index(SubCategoryDataTable $subCategoryDataTable)
    {
        return $subCategoryDataTable->render('sub_categories.index');
    }

    /**
     * Show the form for creating a new SubCategory.
     *
     * @param null $id
     * @return Response
     */
    public function create($id = null)
    {
        return view('sub_categories.create') ->with('category_id', $id);
    }

    /**
     * Store a newly created SubCategory in storage.
     *
     * @param CreateSubCategoryRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateSubCategoryRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['image'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['image']);
        }

        $subCategory = $this->subCategoryRepository->create($input);

        Flash::success('Sub Category saved successfully.');

        return redirect(route('categories.show', [
            'id' => isset($request->category_return) ? $request->category_return : ''
        ]));
    }

    /**
     * Display the specified SubCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subCategory = $this->subCategoryRepository->findWithoutFail($id);
        if (empty($subCategory)) {
            return redirect('/home');
        }
        $chanels = $subCategory->chanels;
        $category_id = isset($subCategory->category_id) ? $subCategory->category_id : '';

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('subCategories.index'));
        }

        return view('sub_categories.show', compact(['category_id','subCategory', 'chanels']));
    }

    /**
     * Show the form for editing the specified SubCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subCategory = $this->subCategoryRepository->findWithoutFail($id);
        $category_id = isset($subCategory->category_id) ? $subCategory->category_id : '';

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('subCategories.index'));
        }

        return view('sub_categories.edit', compact(['category_id','subCategory']));
    }

    /**
     * Update the specified SubCategory in storage.
     *
     * @param  int $id
     * @param UpdateSubCategoryRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateSubCategoryRequest $request)
    {
        $input = $request->all();
        $subCategory = $this->subCategoryRepository->findWithoutFail($id);
        $category_id = isset($subCategory->category_id) ? $subCategory->category_id : '';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['image'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['image']);
        }

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('subCategories.index'));
        }

        $subCategory = $this->subCategoryRepository->update($input, $id);

        Flash::success('Sub Category updated successfully.');

        return redirect(route('categories.show', [
            'id' => $category_id
        ]));
    }

    /**
     * Remove the specified SubCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subCategory = $this->subCategoryRepository->findWithoutFail($id);
        $category_id = isset($subCategory->category_id) ? $subCategory->category_id : '';

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('subCategories.index'));
        }

        $this->subCategoryRepository->delete($id);

        Flash::success('Sub Category deleted successfully.');

        return redirect(route('categories.show', [
            'id' => $category_id
        ]));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy_channel($id, Request $request)
    {
        $sub_category_id = $request->get('sub_category_id');
        $chanel = $this->chanelRepository->findWithoutFail($id);

        if (empty($chanel)) {
            Flash::error('Chanel not found');

            return redirect(route('chanels.index'));
        }

        try {
            $check = $this->chanelRepository->delete($id);
        }
        catch (\Exception $exception) {
            \Log::info("Error db Delete Channel: " . $exception->getMessage());
        }

        Flash::success('Chanel deleted successfully.');

        /**
         *$this->show($sub_category_id);
         * @var TYPE_NAME $category_id
         */
        return redirect(route('categories.show', [
            'id' => $category_id
        ]));
    }
}
