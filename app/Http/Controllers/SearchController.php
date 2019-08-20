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
            
            $data = [
                'user' => $user,
                'cooks' => $cooks,
                'keyword' => $keyword,
            ];
        
        return view('cooks.search', $data);
    }
}
