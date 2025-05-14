<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Показати форму входу.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Обробка логіну.
     */
    public function login(Request $request)
    {
        // Валідація форми
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Знаходимо користувача за username
        $user = User::where('username', $request->username)->first();

        // Перевірка існування та пароля
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            // Редірект за роллю
            return match ($user->role) {
                'admin' => redirect()->route('posts.create'),
                'user' => redirect()->route('user.dashboard'),
                default => redirect()->route('dashboard'),
            };
        }

        // Помилка авторизації
        return back()->withErrors([
            'username' => 'Невірне ім’я користувача або пароль.',
        ])->withInput(['username' => $request->username]);
    }

    /**
     * Вихід із системи.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function username()
    {
        return 'username';
    }
}
