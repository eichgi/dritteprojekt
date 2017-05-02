<?php

namespace App\Http\Controllers;

use App\GithubUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function __construct()
    {
        //$this->middleware('checkAuth')->only('index');
        $this->middleware('guest')->only('index', 'login', 'signUpForm', 'signUp');
    }

    public function index(Request $request)
    {
        return view('auth.login');
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
        $user->password = $request->password;
        $user->save();

        return Redirect::to('/');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        //dd($user);

        if ($this->findOrCreateUser($user, $provider)) {
            return redirect('/');
        }
    }

    public function findOrCreateUser($user, $provider)
    {
        $newUser = User::where('provider_id', $user->id)->first();

        if (count($newUser) == 0) {
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->provider = $provider;
            $newUser->provider_id = $user->id;
            $newUser->save();

            GithubUser::create([
                'user_id' => $user->id,
                'nickname' => $user->nickname,
                'avatar' => $user->avatar,
                'profile_url' => $user->user['html_url'],
                'bio' => $user->user['bio']
            ]);

            $newUser = User::where('provider_id', $user->id)->first();
        }

        session(['email' => $newUser->email]);
        session(['usuario_id' => $newUser->id]);

        return true;
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
