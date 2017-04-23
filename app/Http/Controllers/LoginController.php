<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function index(Request $request)
    {
        if (!$request->session()->get('usuario_id')) {
            return view('auth.login');
        } else {
            return redirect('/');
        }
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $usuario = User::where(['email' => $email])
            ->where('password', '=', $password)
            ->first();

        if (count($usuario)) {
            $request->session()->put('email', $usuario->email);
            session(['usuario_id' => $usuario->id]);
            return redirect('/');
        } else {
            return back()->with('error', 'Datos de acceso incorrectos');
        }
    }

    public function signUpForm()
    {
        return view('auth.signup');
    }

    public function signUp(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|max:8',
            'repassword' => 'same:password'
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return Redirect::to('/');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
