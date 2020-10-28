<?php

namespace App\Http\Controllers;

use App\Models\gameCRUD;
use Illuminate\Http\Request;

class gameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = gameCRUD::all();
        return view('gameView.index',compact('model'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gameView.addGame');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new gameCRUD();
        $model->gameName = $request->get('gameName');
        $model->rating = $request->get('rating');
        $model->genre = $request->get('genre');
        $model->developer = $request->get('developer');      
        $model->releaseDate = $request->get('releaseDate');
        $model->summary = $request->get('summary');              
        $model->save();
        return redirect()->route('gameView.index')->with('success','Game updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gameCRUD  $gameCRUD
     * @return \Illuminate\Http\Response
     */
    public function show(gameCRUD $gameCRUD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gameCRUD  $gameCRUD
     * @return \Illuminate\Http\Response
     */
    public function edit(gameCRUD $gameCRUD)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gameCRUD  $gameCRUD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gameCRUD $gameCRUD)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gameCRUD  $gameCRUD
     * @return \Illuminate\Http\Response
     */
    public function destroy(gameCRUD $gameCRUD)
    {
        //
    }
}
