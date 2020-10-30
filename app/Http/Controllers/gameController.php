<?php

namespace App\Http\Controllers;

use App\Models\gameCRUD;
use App\Models\Genre;
use App\Models\gameGenre;
use App\Models\Elq;
use Illuminate\Http\Request;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class gameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        
        /*$genres = DB::collection('genre')->get();
        $games = Genre::with('game_genre')->get();
        $genres = collect();
        $test = collect();
        $new = collect();
        foreach($model as $m){
            $test->push($m->id);
        }
        foreach($games as $game){
            foreach($test as $mod){
                if($game->id == $game->game_genre->pluck('genre_id')->get('0') && $mod == $game->game_genre->pluck('game_id')->get('0'))
                $genres->push(DB::collection('game_genre')->where('game_id',$mod)->where('genre_id',$game->game_genre->pluck('genre_id')->get('0'))->get());
            }
        }
        $reference = collect($genres)->map(function ($item){
                return (object)$item;
        });
        var_dump($genres->flatten());
            //$genres = DB::collection('game_genre')->where('game_id',$model)->where('genre_id',$genreView->genre_id)->get();
        //$genres = gameGenre::where('game_id',$model['_id'])->where('genre_id',$genreView->genre_id)->get();
 */
        $games = gameCRUD::with(['game_genre','game_genre.genre'])->get();
        return view('gameView.index',compact('games'))->with('i', (request()->input('page', 1) - 1) * 5);
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
    public function show($id)
    {
        //$game = gameCRUD::find($id);
        $game = gameCRUD::with(['game_genre','game_genre.genre'])->get()->find($id);
        return view('gameView.showGame',compact('game'));
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
        $gameCRUD->delete();
        return redirect()->route('gameView.index')
        ->with('success','Book deleted successfully');
    }
    public function getGenre($id){
        
    }
}
