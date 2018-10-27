<?php
namespace App\Http\Controllers\API;


use App\Http\Controllers\AppBaseController;
use App\Models\Chanel;
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
     * Get All information about Category and Chanel
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        $result = [];
        $list_data = $this->categoryRepository->all();

        foreach ($list_data as $item) {
            $result = array_merge($result,
                [
                    [
                        'categories' => [
                            'name' => $item['title'],
                            'videos' => $this->getChanelByCategoryId($item)
                        ]
                    ]
                ]);
        }

        return $this->sendResponse($result, 'Success');
    }

    /**
     * Get Chanel by category_id
     *
     * @param Chanel $item
     * @return array
     */
    public function getChanelByCategoryId($item)
    {
        $result_chanel = [];

        if (!empty($item->chanels)) {
            foreach ($item->chanels as $chanel) {
                $result_chanel = array_merge($result_chanel,[
                    [
                        'name' => $chanel->name,
                        'description' => isset($chanel->description) ? $chanel->description : '',
                        'url' => request()->root() . '/' . $chanel->video_url,
                        'image' => request()->root() . '/' . $chanel->image
                    ]
                ]);
            }
        }
        else {
            $result_chanel = [];
        }

        return $result_chanel;
    }
}