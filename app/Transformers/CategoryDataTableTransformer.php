<?php

namespace App\Transformers;

use App\Models\Call;
use App\Models\Category;
use DateTime;
use League\Fractal\TransformerAbstract;

class CategoryDataTableTransformer extends TransformerAbstract
{
    /**
     * @param Category $categoryDataTable
     * @return array
     * @throws \Throwable
     */
    public function transform(Category $categoryDataTable)
    {
        return [
            'title' => $categoryDataTable->title,
            'description' => $categoryDataTable->description,
            'action' => view('categories.datatables_actions',[
                'id' => $categoryDataTable->id
            ])->render()
        ];
    }
}