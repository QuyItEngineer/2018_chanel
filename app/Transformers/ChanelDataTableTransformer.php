<?php
/**
 * Created by PhpStorm.
 * User: macintosh
 * Date: 10/28/18
 * Time: 11:49 PM
 */

namespace App\Transformers;


use App\Models\Chanel;
use League\Fractal\TransformerAbstract;

class ChanelDataTableTransformer extends TransformerAbstract
{
    /**
     * @param Chanel $chanelDataTable
     * @return array
     * @throws \Throwable
     */
    public function transform(Chanel $chanelDataTable)
    {
        $url = asset('images/' . $chanelDataTable->image);
        return [
            'image' => '<img src = "'. $url .'" atl="image" height="50" width="50">',
            'name' => $chanelDataTable->name,
            'description' => $chanelDataTable->description,
            'video_url' => $chanelDataTable->video_url,
            'action' => view('chanels.datatables_actions', [
                'id' => $chanelDataTable->id
            ])->render()
        ];
    }
}