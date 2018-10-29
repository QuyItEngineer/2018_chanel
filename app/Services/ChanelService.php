<?php
///**
// * Created by PhpStorm.
// * User: macintosh
// * Date: 10/29/18
// * Time: 10:29 PM
// */
//
//namespace App\Services;
//
//
//use App\Repositories\ChanelRepository;
//use Illuminate\Http\UploadedFile;
//
//class ChanelService implements \App\Contracts\ChanelService
//{
//    /**
//     * @var ChanelRepository
//     */
//    private $chanelRepository;
//
//    /**
//     * ChanelService constructor.
//     * @param ChanelRepository $chanelRepository
//     */
//    public function __construct(ChanelRepository $chanelRepository)
//    {
//
//        $this->chanelRepository = $chanelRepository;
//    }
//
//    /**
//     * @param array $attributes
//     * @param UploadedFile|null $image
//     * @return mixed
//     * @throws \Exception
//     */
//    public function createChanel(array $attributes, UploadedFile $image = null)
//    {
//        \DB::beginTransaction();
//        try {
//            if (isset($image)) {
//                $avatarPath = $image->store('avatar', 'public_uploads');
//                $attributes['avatar'] = '/uploads/' . $avatarPath;
//            }
//            $model = $this->chanelRepository->create($attributes);
//            \DB::commit();
//            return $model;
//        } catch (\Exception $ex) {
//            \DB::rollBack();
//            throw $ex;
//        }
//    }
//
//    /**
//     * @param array $attributes
//     * @param $id
//     * @param UploadedFile|null $image
//     * @return mixed
//     */
//    public function updateChanel(array $attributes, $id, UploadedFile $image = null)
//    {
//        // TODO: Implement updateChanel() method.
//    }
//}