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
            'name' => 'required|max:191',
            'method' => 'required|max:191',
            'ingredient1' => 'required|max:191',
            'ingredient2' => 'required|max:191',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function search(Request $request)
    {
        $this->validate($request, [
            'keyword' => 'required',
        ]);
        
            $user = \Auth::user();
            //$cooks = $user->cooks()->orderBy('created_at', 'desc')->get();
            $cooks = Cook::where('ingredient1', $request->keyword)
                        ->orWhere('ingredient2', $request->keyword)
                        ->orWhere('method', $request->keyword)
                        ->inRandomOrder()
                        ->take(3)
                        ->get();
            $data = [
                'user' => $user,
                'cooks' => $cooks,
            ];
        
        return view('cooks.search', $data);
    }
}