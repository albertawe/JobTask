<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\credit;
use App\UserProfile;
use App\UserSkill;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/dashboard';

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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->user_type_id = '2';
        $user_profile = new UserProfile();
        $usercredit = new credit();
        $usercredit->credit = 0;
        $user_profile->first_name = $data['firstname'];
        $user_profile->last_name = $data['lastname'];
        $user_profile->email = $data['email'];
        $user->save();
        $user->credit()->save($usercredit);
        $user->user_profile()->save($user_profile);
        $user_skill = new UserSkill();
        $user->user_skill()->save($user_skill);

        return $user;
    }
}
