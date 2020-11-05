<?php

namespace App\Http\Controllers;

use App\Models\gameCRUD;
use App\Models\Genre;
use App\Models\gameGenre;
use App\Models\Profile;
use Image;
use Illuminate\Http\Request;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request){
        //var_dump(Profile::search($request->get('search'))->get());
        $result = Profile::where('nama_lengkap','like',$request->get('search'))->get();
        return view('friends/searchprofiles',compact('result'));
    }
}
