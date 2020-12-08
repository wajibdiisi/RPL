<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\userPost;
use App\Models\Review;
use App\Models\gameUser;
use App\Models\ProfileManager;
use App\Helpers\UserHelp;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;


class activityController extends Controller
{
    
    public function index()
    {
       return view('profile.activity');
    }
    public function show($id){
        Paginator::useBootstrap();
        $data = collect();
        $friendtemp = profileManager::where('profile_id',$id)->pluck('friend_ids')->toArray();
        foreach($friendtemp['0'] as $fl){
            if($fl['status'] == "approved"){
                $data->push($fl['id']);
            }    
        }
        $data->push($id);
        $game = gameUser::whereIn('profile_id',$data)->get();
        $review = Review::whereIn('profile_id',$data)->get();
        $merged = $game->merge($review)->sortByDesc('updated_at')->paginate(10);
        return view('profile.activity',compact('merged'));
    }
}
