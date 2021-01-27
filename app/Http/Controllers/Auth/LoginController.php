<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        if ((sizeOf(User::all())) == 0) {
            $user = User::create([
                'name' => 'mohsen',
                'email' => 'mohsen@yahoo.com',
                'password' => password_hash('123456789', PASSWORD_DEFAULT),
                'first_name' => 'mohsen',
                'last_name' => 'tozandejani',
                'father_name' => 'alireza',
                'address' => 'ney city',
                'father_job' => 'aaa',
                'mobile_number' => '09385551144',
                'father_mobile_number' => '09365556633',
                'grade' => 2,
                'user_type' => 'superAdmin',
                'registery_date' => '2020-05-23',
                'ban_status' => '1',
                'banded_times' => '2020'
            ]);
            $user->save();
        }
        $this->middleware('guest')->except('logout');
    }
}
