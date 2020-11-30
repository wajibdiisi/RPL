<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Models\User;
use App\Models\Profile;
use App\Models\Game;
use App\Models\gameUser;
use App\Models\gameCRUD;
use App\Helpers\UserHelp;
use App\Models\userCollection;

use App\Models\ProfileManager;
use DataTables;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    public function show($id){
        
        $userView = Profile::where('user_id','=',$id)->orWhere('username','=',$id)->orWhere('_id','=',$id)->with('profilemanager','userpost','comments','showFavourite','gameCollection','collection')->first();
        if(Auth::user()){
            $currentUser = Auth::user()->id;
            $user = Profile::with('profilemanager')->where('user_id','=',$currentUser)->first();
            $currentUser_id = $user->id;
        }else{
            $currentUser_id = 'guest';
        }
        $checkUser = ProfileManager::with('embedsRequest')->where('profile_id','=',$userView->id)->first();
        $friendArray = array();
        foreach($checkUser->friend_ids as $friendId){
            if($friendId['status'] == 'approved')
            array_push($friendArray,$friendId['id']);
        }
        $gamelist = Game::where('userlist.profile_id' ,'=', $userView->id)->get();
       
        $friendList = Profile::whereIn('_id',$friendArray)->get();
        if($currentUser_id != "guest")
        $friendCheck = ProfileManager::where('profile_id','=',$userView->id)->where('friend_ids.id',$currentUser_id)->exists();
        else{
            $friendCheck = false;
        }
        $needAction = $checkUser->embedsRequest->contains('status','Need Action');
        return view('profile/profile',compact('friendList','friendCheck','userView','currentUser_id','gamelist','needAction'));
        //$checkUser = ProfileManager::with('profileFriend')->where('profile_id','=',$user->id)->get();
    }
    public function add_wishlist($game_id,$profile_id){
        $data = Profile::with('gameWishlist')->find($profile_id);
        $array = $data->gameWishlist->toArray();
        $check = in_array($game_id,$data->game_wishlist);
        if(!$check)
        $data->gameWishlist()->attach($game_id);
        else
        $data->gameWishlist()->detach($game_id);
        $game_url = UserHelp::getGame_URL($game_id);
        $test = gameCRUD::all();
        return redirect()->route('game.show',$game_url);
        
    }

   

    public function showRequest($id){
    
        $user = ProfileManager::with('embedsRequest')->where('user_id','=',Auth::user()->id)->first();
        $reqArray=array();
        foreach($user->embedsRequest as $req){
            if($req->status == 'Need Action'){
                array_push($reqArray,['id'=>$req->id,'timeAdded' =>$req->timeAdded]);
            }
        }
        $friendReq = Profile::whereIn('_id',array_column($reqArray,'id'))->get();
        return view('profile/friendRequest',compact('user','friendReq','reqArray'));
        }

    public function update_avatar(Request $request,$id){
    // Logic for user upload of avatar
       
        $updateProfile = Profile::where('_id','=',$id)->first();
        if($request->hasFile('avatar') && $updateProfile){
            $avatar = $request->file('avatar');
            $filename = $updateProfile->id ."." . $avatar->getClientOriginalExtension();
            $path = 'uploads/avatars/' . $filename;
            Image::make($avatar)->resize(300, 300)->save($path);
            $updateProfile->avatar = $filename;
            $updateProfile->save();
        }
        $unique = Profile::where('username','=',$request->get('username'))->exists();
        if(!$unique && $request->get('username')){
            $updateCollection = userCollection::where('profile_id',$updateProfile->username)->get();
            foreach($updateCollection as $update){
                $update->profile_id = $request->get('username');
                $update->save();
            }
            $updateProfile->username = $request->get('username');
            $updateProfile->save();
            $request->session()->forget('username');
            $request->session()->put('username',$request->get('username'));
        }
        elseif($unique && $request->get('username')){   
            return redirect()->route('profile.show',$request->session()->get('username'))->with(['error' => 'Username sudah terpakai']);
        }

    return redirect()->route('profile.show',$request->session()->get('username'))->with(['success' => 'Data berhasil diubah']);
}


    public function detail(Request $request,$id){
        $user = Profile::where('user_id','=',$id)->orWhere('username','=',$id)->orWhere('_id','=',$id)->first();
        if($request->ajax()){
            $data = gameUser::where('profile_id',$id)->with('gameData')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })->addColumn('title', function($data){
                    return '<a class ="text-decoration-none" href="' . route('game.show', $data->gameData->custom_url) .'">'.$data->gameData->gameName.'</a>';      
                })->editColumn('updated_at',function($data){
                    return $data->updated_at->diffForHumans();
                })
                ->rawColumns(['action','title'])
                ->make(true);
        }
        
        return view('profile.profile_detail',compact('user'));
    }

    public function dataTable(){
        $data = Profile::all();
        dd($data);
        
    }
    public function show_collection($id){
        $data = userCollection::where('profile_id',$id)->get()->load('game')->toJson();
        return $data;
    }
    public function single_collection($collection_id){
        $data = userCollection::with('game')->find($collection_id)->toJson();
        return $data;
    }
    public function get_currentUser(){
        if(Auth::user())
        $data = Profile::where('user_id','=',Auth::user()->id)->first();
        return $data;
    }

    public function delete_fromCollection($collection_id,$game_id){
        $data = userCollection::with('game')->find($collection_id);
        $data->game()->detach($game_id);
    }

    public function addgame_toCollection(Request $request,$username,$game_id){
        $data = userCollection::with('game')->find($request->get('addCollection'));
        if(!$data->game->contains($game_id))
        $data->game()->attach($game_id);
        else{
            toastr()->info('Game Already Existed on this Collection');
        }
        $game_url = UserHelp::getGame_URL($game_id);
        return redirect()->route('game.show',$game_url);
    }
    public function new_collection(Request $request,$id){
        return userCollection::create([
            'collection_name' => $request->get('name'),
            'description' => $request->get('description'),
            'profile_id' => $id
        ]);
    }
}