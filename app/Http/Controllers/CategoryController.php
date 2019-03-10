<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\SubCategoryRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class CategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;
    /**
     * @var SubCategoryRepository
     */
    private $subCategoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepo
     * @param SubCategoryRepository $subCategoryRepository
     */
    public function __construct(CategoryRepository $categoryRepo, SubCategoryRepository $subCategoryRepository)
    {
        $this->categoryRepository = $categoryRepo;
        $this->subCategoryRepository = $subCategoryRepository;
    }

    /**
     * Display a listing of the Category.
     *
     * @param CategoryDataTable $categoryDataTable
     * @return Response
     */
    public function index(CategoryDataTable $categoryDataTable)
    {
        return $categoryDataTable->render('categories.index');
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();

        $category = $this->categoryRepository->create($input);

        Flash::success('Category saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);
        if (empty($category)) {
            return redirect('/home');
        }
        $sub_categories = $category->subCategories;

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.show', compact(['category', 'sub_categories']));
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  int $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $category = $this->categoryRepository->update($request->all(), $id);

        Flash::success('Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Category deleted successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy_subcategory ($id, Request $request)
    {
        $category_id = $request->get('category_id');
        $chanel = $this->subCategoryRepository->findWithoutFail($id);

        if (empty($chanel)) {
            Flash::error('Chanel not found');

            return redirect(route('chanels.index'));
        }

        try {
            $check = $this->subCategoryRepository->delete($id);
        } catch (\Exception $exception) {
            \Log::info("Error db Delete Channel: " . $exception->getMessage());
        }

        Flash::success('Chanel deleted successfully.');

        /** @var TYPE_NAME $category_id */
        return $this->show($category_id);
    }
}
