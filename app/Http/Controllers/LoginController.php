<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->redirectTo = url()->previous();
    // }


    public function login(Request $request)
    {
        $redirect =  URL::previous();
        // echo $redirect;
        // die;

        $request->session()->put('redirect', $redirect);
        // session(['redirect' => $redirect]);;
        return view('login.index',[
            'title' => 'Login',
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['email','required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            // echo "berhasil login!";
            if (auth()->user()->role == 1 ){
                return redirect()->intended('dashboard');
            }else {
                
                // ddd($request->header('referer'));
                // ddd($request->session()->get('redirect', '/'));
                return redirect($request->session()->get('redirect', '/'));
            }
        }

        return back()->with('message','Login Failed!');

    }
    public function register()
    {
        return view('login.register',[
            'title' => 'Register'
        ]);
    }

    public function AuthRegis(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['email','required'],
            'password' => ['required'],
            'name' => ['required'],
            'role' => ['required'],
        ]);
        // return $request->all();

        $validatedData['password'] = Hash::make($validatedData['password']);
        // ddd($validatedData);
        User::create($validatedData);

        // $request->session()->flash('message','Register Successfull! PLease Login');
        alert::success('Sucsess','Register Successfull! PLease Login');
        return redirect('login');   
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
