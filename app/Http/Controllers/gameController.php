<?php

namespace App\Http\Controllers;

use App\Models\gameCRUD;
use App\Models\Genre;
use App\Models\gameGenre;
use App\Models\Elq;
use Image;
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
        /*
        $games = gameCRUD::with(['game_genre','game_genre.genre'])->get();
        */
        $games = gameCRUD::with(['genre'])->get();
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
        $model = new gameCRUD;
        $model->gameName = $request->get('gameName');
        $model->rating = $request->get('rating');
        $arrayGenre = explode(',',$request->input('genre'));
        $arrayGenre_id = Genre::whereIn('title',$arrayGenre)->pluck('_id')->toArray();
        $model->developer = $request->get('developer');      
        $model->releaseDate = $request->get('releaseDate');
        $model->summary = $request->get('summary');          
        $model->save();
        $model->genre()->attach($arrayGenre_id);
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
        $game = gameCRUD::with(['genre'])->get()->find($id);
        //$game = gameCRUD::with(['game_genre','game_genre.genre'])->get()->find($id);
        return view('gameView.showGame',compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gameCRUD  $gameCRUD
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = gameGenre::with(['genre'])->where('game_id',$id)->get();
        $game = gameCRUD::with(['game_genre','game_genre.genre'])->get()->find($id);
        $filename = $id .".png";
        $path = 'uploads/gamePicture/' . $filename;
        return view('gameAdmin.editGame',compact('game','genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gameCRUD  $gameCRUD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gameUpdate = gameCRUD::with(['genre'])->where('_id', '=', $id)->first();
        $arrayGenre = explode(',',$request->input('genre'));
        $arrayGenre_id = Genre::whereIn('title',$arrayGenre)->pluck('_id')->toArray();
        if(!$gameUpdate->genre()->exists()){
            $gameUpdate->genre()->attach($arrayGenre_id);
        }else if($arrayGenre_id){
            $gameUpdate->genre()->sync($arrayGenre_id);
        }
        $gameUpdate->gameName = $request->get('gameName');
        $gameUpdate->rating = $request->get('rating');
        $gameUpdate->genre = $request->get('genre');
        $gameUpdate->developer = $request->get('developer');      
        $gameUpdate->releaseDate = $request->get('releaseDate');
        $gameUpdate->summary = $request->get('summary');
        
        

        /*foreach($gameUpdate->genre_ids as $genres){
            if($genres != NULL){$genre = Genre::where('game_ids',$id)->get()->first();
            $genre->game()->sync($arrayGenre_id);
        }}
        */
        /*foreach($arrayGenre_id as $array){
            foreach($gameUpdate->genre_ids as $genre_id){
            if($genre_id != $array->id){
                Genre::find($array->id)->push('game_ids',$id);
                }
            }
        }*/
        /*
        $gameUpdate = gameCRUD::with(["game_genre","game_genre.genre" => function($q) use ($id){
            $q->where('game_genre.genre.id', '=', $id);
        }])->get();
        $genreUpdate = Genre::whereIn('title',$arrayGenre)->with(['game_genre','game_genre.game'=> function($q) use ($id){
            $q->where('id','=',$id); //salah,buat relation dari gamegenre 
        }])->get();
        var_dump($genreUpdate->first()->game_genre);
       
        $oldGenre = gameGenre::where('game_id','=',$id)->first();
        foreach($arrayGenre as $array){
            foreach($genreUpdate as $Update){
                foreach($Update->game_genre as $Up){
                    var_dump(gameGenre::where('game_id', '=', $id)->where('genre_id','=',$Up->genre_id)->exists());
                if($Update->title == $array){
                    if($oldGenre->genre_id != $Up->genre_id && !gameGenre::where('game_id', '=', $id)->where('genre_id','=',$Up->genre_id)->exists()){                             
                            gameGenre::where('game_id', '=', $id)->update(array("genre_id" => $Update->game_genre->first()->genre_id));
                        }
                    
                }}
            }
        }*/
        if($request->hasFile('gamePicture')){
            $gamePicture = $request->file('gamePicture'); 
            $filename = $id ."." . $gamePicture->getClientOriginalExtension();
            $path = 'uploads/gamePicture/' . $filename;
            Image::make($gamePicture)->save($path);
            $gameUpdate->gamePicture = $filename;
        }
        $gameUpdate->fill(array_filter($request->input()))->save();
        return redirect()->route('gameView.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gameCRUD  $gameCRUD
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = gameCRUD::find($id);
        $data->delete();
        return redirect()->route('gameView.index')
        ->with('success','Game deleted successfully');
    }
    public function getGenre($id){
        
    }
}
