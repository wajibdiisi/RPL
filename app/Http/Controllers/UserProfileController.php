<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Models\User;
use App\Models\Profile;
use App\Models\Game;
use App\Models\gameUser;
use App\Models\ProfileManager;
use DataTables;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    public function show($id){
        
        $userView = Profile::where('user_id','=',$id)->orWhere('username','=',$id)->orWhere('_id','=',$id)->with('profilemanager','userpost','comments','showFavourite','gameCollection')->first();
        if(Auth::user()){
            $currentUser = Auth::user()->id;
            $user = Profile::with('profilemanager')->where('user_id','=',$currentUser)->first();
            $currentUser_id = $user->id;
        }else{
            $currentUser_id = 'guest';
        }
        $checkUser = ProfileManager::where('profile_id','=',$userView->id)->first(); //awalnya $user->id 
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
        return view('profile/profile',compact('friendList','friendCheck','userView','currentUser_id','gamelist'));
        //$checkUser = ProfileManager::with('profileFriend')->where('profile_id','=',$user->id)->get();
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
            $updateProfile->username = $request->get('username');
            $updateProfile->save();
            $request->session()->forget('username');
            $request->session()->put('username',$request->get('username'));
        }
        elseif($unique && $request->get('username')){
            flashy()->push('This message will be flashed.');
            return redirect()->route('profile.show',$request->session()->get('username'))->with(['error' => 'Username sudah terpakai']);
        }

        flashy()->push('This message wisss.');
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
}