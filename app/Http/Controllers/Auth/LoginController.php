<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Hash;
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
    protected $redirectTo = '/inicio';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(){
        return view("auth.login");
    }

    public function postLogin(Request $request)
    {
    //  dd($request);
     $this->validate($request, [
         'usuario' => 'required|min:9|numeric',
         'password' => 'required',
     ]);
     // $credentials = $request->only('user', 'password');
    if (\Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password])) {
        $usuarioactual=\Auth::user();
        return redirect('/inicio');
     }
     return redirect('/login');
     }

     public function user(){
        $user = new User();
        $user->name="William Torres Mora";
        $user->usuario = "601900243";
        $user->rol = 1;
        $user->password = Hash::make('Admin');
        $user->save();
}//fin de iniciarUsuarioAdmin

public function username()
{
    return 'usuario'; //ahora utilizaremos la columna name de la tabla users
}



public function usersecretario(){
    $usersecretario = new User();
    $usersecretario->name="Pedro Fernandez";
    $usersecretario->usuario = "808880888";
    $usersecretario->rol = 2;
    $usersecretario->password = Hash::make('Admin');
    $usersecretario->save();
}
}
