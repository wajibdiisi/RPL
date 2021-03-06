<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\gameUser;
use Auth;
use App\Models\Review;
use App\Models\Profile;
use App\Helpers\UserHelp;
use App\Models\gameCRUD;
use RealRashid\SweetAlert\Facades\Alert;

class gameUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$game_id)
    {
        /*
        $profile_id =  UserHelp::getID(Auth::user()->id);
        $data = gameUser::create([
            'profile_id' => $profile_id,
            'user_id' => Auth::user()->id,
            'gamelist' => [
                ['id' => $game_id,
                  'status' => $request->get('radio')
            ],
            ],
        ]);
        $game = gameCRUD::find($game_id);
        $gameData = array(
                    'profile_id' => $profile_id,
                    'status' => $request->get('radio')
        );
        $game->pull('userlist',['profile_id' =>$profile_id]);
        $game->push('userlist',$gameData);
        */
        $profile_id = UserHelp::getID(Auth::user()->id);
        $userData = array(
            'profile_id' => $profile_id,
            'game_id' => $game_id,
            'status' => $request->get('addRadio')
        );
        gameUser::updateOrCreate([
            'game_id' => $game_id,'profile_id' => $profile_id
        ],['status' => $request->get('addRadio')]);
        Alert::success('Success', "Game Added to your collection");
        return redirect()->route('gameView.show',$game_id);
    }

    public function store_review(Request $request,$game_id){
        $profile_id = UserHelp::getID(Auth::user()->id);
        $game_url = UserHelp::getGame_URL($game_id);
        Review::updateOrCreate([
            'game_id' => $game_id,
            'profile_id' => $profile_id,
        ],['rating' => $request->get('reviewRadio'),
        'review_content' => $request->get('review_content')
        ]);
        return redirect()->route('game.show',$game_url);
    }

    public function store_rating(Request $request,$game_id){
        $profile_id = UserHelp::getID(Auth::user()->id);
        $game_url = UserHelp::getGame_URL($game_id);
        gameUser::updateOrCreate([
            'game_id' => $game_id,
            'profile_id' => $profile_id,
        ],[
            'rating' => $request->get('rating')
        ]);
        return redirect()->route('game.show',$game_url);
    }



    public function addFavourite($game_id){
        $profile = Profile::with('game_favourite')->where('user_id','=',Auth::user()->id)->first();
        if(count($profile->favourite_game) > 3) {
            Alert::error("Operation Failed", "You can only add up to 4 games to your favourite list, please delete one before performing this action");
            $game_url = UserHelp::getGame_URL($game_id);
            return redirect()->route('game.show',$game_url);
        }
        $profile->game_favourite()->attach($game_id);
        $game_url = UserHelp::getGame_URL($game_id);
        Alert::success('Success', "Game Added Successfully to your Favourites ");
        return redirect()->route('game.show',$game_url);
    }
    public function removeFavourite($game_id){
        $profile = Profile::with('game_favourite')->where('user_id','=',Auth::user()->id)->first();
        $profile->game_favourite()->detach($game_id);
        $game_url = UserHelp::getGame_URL($game_id);
        return redirect()->route('game.show',$game_url);
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
    public function like_review($id,$user_id){
        $review = Review::find($id);
        $review->push('thumbsup',$user_id,true);
        return redirect()->route('all_review',UserHelp::getGame_URL($review->game_id));
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
}
