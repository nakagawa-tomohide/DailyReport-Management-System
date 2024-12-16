<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * ログイン中のユーザーの情報をマイページに表示
     *
     * @return void
     */
    public function myPage() {
        // ログイン中のユーザーを取得
        $user = Auth::user();

        return view('User.myPage', compact('user'));
    }

    /**
     * ユーザー情報を更新
     *
     * @param Request $request
     * @return void
     */
    public function myEdit(Request $request)
    {
        $inputs = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string', 'email','max:255',
                Rule::unique('users')->ignore(Auth::id()),
            ],
        ]);

        Auth::user()->update($inputs);

        $message = '更新に成功しました';

        return redirect()->route('myPage')->with(compact('message'));
    }
}
