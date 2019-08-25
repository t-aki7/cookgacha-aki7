<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cook;

class UsersController extends Controller
{
    function cooked_index()
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            $cooks = $user->votes()->orderBy('created_at', 'desc')->paginate(5);
            $ids_count = [];
            foreach ($cooks as $cook) {
                $cook_id = $cook->id;
                $count_cooked = Cook::find($cook_id)->voted()->count();
                $ids_count = $ids_count + array($cook_id => $count_cooked);
            }
            
            $data = [
                'user' => $user,
                'cooks' => $cooks,
                'ids_count' => $ids_count,
            ];
            
            return view('users.cooked_index', $data);
        }
        
        return redirect ('/');
    }
}
