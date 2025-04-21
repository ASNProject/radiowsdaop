<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuhtController extends Controller
{
    /**
     * Write code on Method
     * 
     * @return response()
     */
    public function index(): View
    {
        return view('login');
    }

    /**
     * Write code on Method
     * 
     * @return response()
     */
    public function register(): View
    {
        return view('register');
    }
    /**
     * Write code on Method
     * 
     * @return response()
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->intended('home')->with('success', 'Login successful');
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    /**
     * Write code on Method
     * 
     * @return response()
     */
    public function registerUser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data = $request->all();
        $user = $this->create($data);
        Auth::login($user);
        return redirect()->intended('home')->with('success', 'Registration successful');
    }
    /**
     * Write code on Method
     * 
     * @return response()
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard.home');
        }
        return redirect()->route('login')->with('error', 'Please login to access the dashboard');
    }
    /**
     * Write code on Method
     * 
     * @return response()
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect('login')->with('success', 'Logout successful');
    }
    /**
     * Write code on Method
     * 
     * @return response()
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
