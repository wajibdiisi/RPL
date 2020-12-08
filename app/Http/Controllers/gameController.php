<?php

namespace App\Http\Controllers;

use App\Models\gameCRUD;
use App\Models\Genre;
use App\Models\gameGenre;
use App\Models\Platform;
use Image;
use App\Models\gameUser;
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
      
        $games = gameCRUD::with(['genre'])->get();
        return view('gameView.index',compact('games'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function welcome(){
        $games = gameCRUD::orderBy('view_counter','desc')->get()->take('6');
        return view('welcome',compact('games'));
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
        $model->userfav = array(); 
        $model->custom_url = $request->get('custom_url');
        $model->min_requirement = [
        'OS' => 'OS',
        'Processor' => 'Processor',
        'Memory' => 'Memory',
        'Graphics' => 'Graphics',
        'DirectX' => 'DirectX',
        'Storage' => 'Storage',];
        $model->rec_requirement = [
            'OS' => 'OS',
            'Processor' => 'Processor',
            'Memory' => 'Memory',
            'Graphics' => 'Graphics',
            'DirectX' => 'DirectX',
            'Storage' => 'Storage',];
        $model->wishlist = array();
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
        
        $game = gameCRUD::with(['genre','review','gameUser','user_collection'])->get()->find($id);

        $key = 'game' . $game->id;
       
        if(\Session::has($key)){
            
        }else{
            $game->increment('view_counter',1);
            \Session::put($key,1);   
        }
        $totalUser = count($game->gameUser->where('status','!=',null));
        if($totalUser > 0){
        $wtp = $game->gameUser->where('status','Want to Play')->count() / $totalUser * 100;
        $cp = $game->gameUser->where('status','Currently Playing')->count() /$totalUser * 100;
        $beaten =  $game->gameUser->where('status','Beaten')->count() / $totalUser * 100;
        $completed =  $game->gameUser->where('status','Completed')->count() /$totalUser * 100;
        $dropped =  $game->gameUser->where('status','Dropped')->count() / $totalUser * 100 ;
        $dataBar = array(
            'wtp' => $wtp,
            'cp' => $cp,
            'beaten' => $beaten,
            'completed' => $completed,
            'dropped' => $dropped,
            'totalUser' =>$totalUser
        );
    }else{
        $dataBar = array(
            'wtp' => '',
            'cp' => '',
            'beaten' => '',
            'completed' => '',
            'dropped' => '',
            'totalUser' => ''
        );
    }
        $totalUserRating = count($game->gameUser->where('rating', '!=' , null));
        if($totalUserRating > 0 ){
            $dataRating = array(
                'five_star' => $game->gameUser->where('rating','5')->count() / $totalUserRating * 100,
                'four_star' => $game->gameUser->where('rating','4')->count() / $totalUserRating * 100,
                'three_star' => $game->gameUser->where('rating','3')->count() / $totalUserRating * 100,
                'two_star' => $game->gameUser->where('rating','2')->count() / $totalUserRating * 100,
                'one_star' => $game->gameUser->where('rating','1')->count() / $totalUserRating * 100,
                'total_user' => $totalUserRating    
            );
        }else{
            $dataRating = array(
                'five_star' => '',
                'four_star' => '',
                'three_star' => '',
                'two_star' => '',
                'one_star' => '',
                'total_user' => '0'
            );
        }
        $star_rating = $game->gameUser->avg('rating');
        return view('gameView.showGame',compact('game','dataBar','star_rating','dataRating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gameCRUD  $gameCRUD
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = gameCRUD::with(['genre'])->where('_id', '=', $id)->first();
        $platforms = Platform::all();
        $genreList = Genre::all();
        /*$genre = gameGenre::with(['genre'])->where('game_id',$id)->get();
        $game = gameCRUD::with(['game_genre','game_genre.genre'])->get()->find($id);
        $filename = $id .".png";
        $path = 'uploads/gamePicture/' . $filename;
        */
        return view('gameAdmin.editGame',compact('game','genreList','platforms'));
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
        $gameUpdate = gameCRUD::with(['genre','platform'])->where('_id', '=', $id)->first();
      
        $arrayGenre = $request->genre;
        
        $arrayGenre_id = Genre::whereIn('title',$arrayGenre)->pluck('_id')->toArray();
        if(!$gameUpdate->genre()->exists()){
            $gameUpdate->genre()->attach($arrayGenre_id);
        }else if($arrayGenre_id){
            $gameUpdate->genre()->sync($arrayGenre_id);
        }
        $platform_id = Platform::whereIn('title',$request->platform)->pluck('_id')->toArray();
        if(!$gameUpdate->platform()->exists()){
            $gameUpdate->platform()->attach($platform_id);
        }else{
            $gameUpdate->platform()->sync($platform_id);
        }
        $gameUpdate->gameName = $request->get('gameName');
        $gameUpdate->rating = $request->get('rating');
        $gameUpdate->genre = $request->get('genre');
        $gameUpdate->developer = $request->get('developer');      
        $gameUpdate->releaseDate = $request->get('releaseDate');
        $gameUpdate->summary = $request->get('summary');
        $arrMin = [
            'OS' => $request->get('min_OS'),
            'Processor' => $request->get('min_Processor'),
            'Memory' => $request->get('min_Memory'),
            'Graphics' => $request->get('min_Graphics'),
            'DirectX' => $request->get('min_DirectX'),
            'Storage' => $request->get('min_Storage')
        ];
        $gameUpdate->min_requirement = $arrMin;
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
        toastr()->success('Data Deleted Successfully');
        return redirect()->route('gameView.index');
    }
    public function getGenre($id){
        
    }
    public function gameList($id){
        if($id == 'all'){
        $data = gameCRUD::all();
        }
        else
            $data = gameCRUD::where('genre_ids',$id->id)->get();
        $genre = Genre::all();
        return view('gameView.gamehome',compact('data','genre','id'));
    }
    public function show_review($game_id){
        $game = gameCRUD::with('review')->where('custom_url','=',$game_id)->first();
        return view('gameView.all_review',compact('game'));
    }
}
