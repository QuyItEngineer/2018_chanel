<?php
/**
 * Created by PhpStorm.
 * User: macintosh
 * Date: 3/17/19
 * Time: 11:54 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\AppBaseController;
use App\Repositories\ChanelRepository;
use Illuminate\Http\Request;

class ChannelAPIController  extends AppBaseController
{
    /**
     * @var ChanelRepository
     */
    private $chanelRepository;

    /**
     * ChannelAPIController constructor.
     * @param ChanelRepository $chanelRepository
     */
    public function __construct(ChanelRepository $chanelRepository)
    {
        $this->chanelRepository = $chanelRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function is_video_status(Request $request)
    {
        if (empty($request->channel_id)) {
            return $this->sendError([
                'error' => 'not found channel id'
            ], 400);
        }

        $is_video_status_param = isset($request->is_check)
            ? (($request->is_check == 'true')
                ? config('constants.IS_VIDEO_STATUS_TRUE')
                : config('constants.IS_VIDEO_STATUS_FALSE'))
            : config('constants.IS_VIDEO_STATUS_FALSE');
        $channel_update_video_status = $this->chanelRepository->update([
            'is_show_video_url' => $is_video_status_param
        ], $request->channel_id);

        \Log::info('SHOW', [
            isset($channel_update_video_status) ? $channel_update_video_status : '-',
        ]);
        \Log::info('SHOW ID', [
            isset($is_video_status_param) ? $is_video_status_param : '-',
        ]);

        return $this->sendResponse([
            'user' => 'VALUE GOOD...',
        ], 'Updated credit card successfully');
    }
}