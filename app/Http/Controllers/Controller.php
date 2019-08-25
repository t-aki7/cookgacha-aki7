<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use app\Cook;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user)
    {
        //ユーザ登録料理のカウント
        $count_cooks = $user->cooks()->count();
        //ログインユーザが自分がCookedしたCookのカウント
        
        return [
            'count_cooks' => $count_cooks,
        ];
    }
    
    //Cookが押された数のカウント
    public function count_cooked($cooks)
    {
        $ids_count = [];
        foreach ($cooks as $cook) {
            $cook_id = $cook->id;
            $count_cooked = Cook::find($cook_id)->voted()->count();
            $ids_count = $ids_count + array($cook_id => $count_cooked);
        }
        return [$ids_count];
    }
}
