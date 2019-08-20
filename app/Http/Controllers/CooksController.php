<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cook;

class CooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//userが登録した料理一覧の取得
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            $cooks = $user->cooks()->orderBy('created_at', 'desc')->paginate(5);
            
            $data = [
                'user' => $user,
                'cooks' => $cooks,
            ];
            
            return view('cooks.index', $data);    
        }
        return redirect('/');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::check()) {
            $cook = new Cook;
            
            return view('cooks.create', [
                'cook' => $cook,
            ]);
        }
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'method' => 'required',
            'ingredient1' => ['required', 'max:20', 'regex:/^[あ-んア-ン]*$/'],
            'ingredient2' => ['required', 'max:20', 'regex:/^[あ-んア-ン]*$/'],
        ]);
        
        $request->user()->cooks()->create([
            'name' => $request->name,
            'method' => $request->method,
            'ingredient1' => $request->ingredient1,
            'ingredient2' => $request->ingredient2,
        ]);
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \Auth::user()->id;
        $cook = Cook::find($id);
        
        if (\Auth::check()) {
            if ($user == $cook->user_id) {
                return view('cooks.edit', [
                    'cook' => $cook,
                ]);
            }
        }
        
        return redirect('/');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'method' => 'required',
            'ingredient1' => ['required', 'max:20', 'regex:/^[あ-んア-ン]*$/'],
            'ingredient2' => ['required', 'max:20', 'regex:/^[あ-んア-ン]*$/'],
        ]);
        
        $cook = Cook::find($id);
        $cook->name = $request->name;
        $cook->method = $request->method;
        $cook->ingredient1 = $request->ingredient1;
        $cook->ingredient2 = $request->ingredient2;
        
        $cook->save();
        
        $user = \Auth::user();
            $cooks = $user->cooks()->orderBy('created_at', 'desc')->paginate(5);
            
            $data = [
                'user' => $user,
                'cooks' => $cooks,
            ];
        
        return redirect()->route('cooks.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Auth::check()) {
            $user = \Auth::user()->id;
            $cook = Cook::find($id);
            
            if ($user == $cook->user_id) {
                $cook->delete();
            }
        }
        return back();
    }
    
}