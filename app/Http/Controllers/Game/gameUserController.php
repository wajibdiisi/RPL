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
        
        return redirect()->route('gameView.show',$game_id);
    }

    public function storeRating(Request $request,$game_id){
        $profile_id = UserHelp::getID(Auth::user()->id);
        
        Review::updateOrCreate([
            'game_id' => $game_id,
            'profile_id' => $profile_id,
        ],['rating' => $request->get('rating'),
        'review_content' => $request->get('review_content')
        ]);
        return redirect()->route('gameView.show',$game_id);

        
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
