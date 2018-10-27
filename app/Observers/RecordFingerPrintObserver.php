<?php
/**
 * Created by IntelliJ IDEA.
 * User: Lai Vu <vuldh@nal.vn>
 * Date: 5/17/18
 * Time: 5:12 PM
 */

namespace App\Observers;


use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RecordFingerPrintObserver
{
    private $userID;

    public function __construct()
    {
        if (!Auth::guest()) {
            /**
             * @var Authenticatable $user
             */
            $user = Auth::user();
            $this->userID = $user->id;
        }
    }

    public function saving($model)
    {
        $model->modfied_by = $this->userID;
    }

    public function saved($model)
    {
        $model->modfied_by = $this->userID;
    }


    public function updating($model)
    {
        $model->modfied_by = $this->userID;
    }

    public function updated($model)
    {
        $model->modfied_by = $this->userID;
    }


    public function creating($model)
    {
        $model->created_by = $this->userID;
    }

    public function created($model)
    {
        $model->created_by = $this->userID;
    }


    public function removing($model)
    {
        $model->deleted_by = $this->userID;
    }

    public function removed($model)
    {
        $model->deleted_by = $this->userID;
    }
}