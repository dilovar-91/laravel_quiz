<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function logout(Request $request)
    {
      
      Auth::logout();
      return redirect('/login');
    }

     protected function authenticated(Request $request, $user)
   {
       // if ($redirect = Role::find($user->role_id)->name)
        //    return redirect(strtolower($redirect)) ;
//print_r(Auth::user());


      if  (Auth::user()->role == 'admin'){
            return Redirect()->route('savolho');
   } 
   else if (Auth::user()->role == 'dovtalab'){
            return Redirect()->route('sanjish', ['1', 'A']);
   } 
    }
}
