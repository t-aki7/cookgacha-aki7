<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cook;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $this->validate($request, [
            'keyword' => ['required', 'max:20', 'regex:/^[あ-んア-ン]*$/'],
        ]);
        
            $user = \Auth::user();
            $cooks = Cook::where('ingredient1', 'like', '%'.$request->keyword.'%')
                        ->orWhere('ingredient2', 'like', '%'.$request->keyword.'%')
                        ->inRandomOrder()
                        ->take(3)
                        ->get();
            $keyword = $request->keyword;
            
            $ids_count = [];
            foreach ($cooks as $cook) {
                $cook_id = $cook->id;
                $count_cooked = Cook::find($cook_id)->voted()->count();
                $ids_count = $ids_count + array($cook_id => $count_cooked);
            }

            $data = [
                'user' => $user,
                'cooks' => $cooks,
                'keyword' => $keyword,
                'ids_count' => $ids_count,
            ];
            
        return view('cooks.search', $data);
    }
}
