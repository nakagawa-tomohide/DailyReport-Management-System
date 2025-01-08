<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * 管理者ログインページ表示
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * 管理者ログイン
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            // 認証に成功した場合、セッションを再生成
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        } else {
            // 認証に失敗した場合、エラーメッセージを表示
            return back()->withErrors([
                'email' => '認証情報が正しくありません',
            ])->withInput($request->only('email'));
        }
    }

    /**
     * 管理者ログアウト
     *
     * @return void
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
