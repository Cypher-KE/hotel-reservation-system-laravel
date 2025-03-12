<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\alphaSpace;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller {

    public function __construct() {

        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Display the login view.
     */
    public function showLoginForm(): View {
        return view('auth.login');
    }

    /**
     * Display the registration view.
     */
    public function showRegistrationForm(): View {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request): RedirectResponse {

        $request->validate([
            'name' => ['required', new AlphaSpace, 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required',
                Password::min(6)
                    ->letters()     // Require at least one letter
                    ->mixedCase()   // Require at least one uppercase and one lowercase letter
                    ->numbers()     // Require at least one number
                    ->symbols(),    // Require at least one symbol
                'confirmed'],
            'password_confirmation' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $fields = session('check_in');
            $request->session()->regenerate();
            session('check_in', $fields);
            if ($request->user()->is_admin) {
                return redirect()->route('admin.index');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'login_err' => 'Invalid Username Or Password.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request): RedirectResponse {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
