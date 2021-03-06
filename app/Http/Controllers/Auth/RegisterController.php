<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Profile;
use App\Models\ProfileManager;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' =>['required','string', 'max:20', 'unique:profile'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => '2',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        try{
            $userData = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role_id' => '2',
            ]);
            $profileData = Profile::create([
                'username' => $data['username'],
                'avatar' => 'defaultPicture.png',
                'nama_lengkap' => $data['name'],
                'user_id' => $userData->id,
                'favourite_game' => array(),
                'game_wishlist' => array(),
                'contact_list' => [
                    ['contact_type' => 'Steam',
                    'contact_name' => 'N/A',
                ],
                    ['contact_type' => 'PSN',
                    'contact_name' => 'N/A'
                ],
                    ['contact_type' => 'Xbox',
                    'contact_name' => 'N/A'
                    ],
                    ['contact_type' => 'Discord',
                    'contact_name' => 'N/A']

                ],  
            ]);
            ProfileManager::create([
                'user_id' => $userData->id,
                'profile_id' => $profileData->id,
                'friend_ids' => [
                    ['id' => '',
                      'status' => '',
                      'time' => ''
                ],
                ],
                'last_seen' => new \MongoDB\BSON\UTCDateTime()
            ]);
        } catch(\Exception $ex){
            \DB::rollBack();
            \Log::error("Error creating User and UserInformation: ".$ex->getMessage());
            return false;
        }
        return $userData;
    }
}
