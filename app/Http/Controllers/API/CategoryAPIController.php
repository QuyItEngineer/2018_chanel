<?php
namespace App\Http\Controllers\API;


use App\Http\Controllers\AppBaseController;
use App\Repositories\CategoryRepository;

/**
 * Class CategoryAPIController
 * @package App\Http\Controllers\API
 *
 * @author quyhbn <quyhbn@nal.vn>
 */
class CategoryAPIController extends AppBaseController
{
    private $categoryRepository;

    /**
     * CategoryAPIController constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        $list_data = $this->categoryRepository->all();
        return $this->sendResponse($list_data->toArray(), 'Contacts retrieved successfully');
    }
}