<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    // メール認証有無の確認
    public function verify(Request $request)
    {
        $user = $request->user();
        // 既にメール認証済みの場合はそのままホーム画面へ遷移
        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::MYPAGE)->with('result', 'ログインしました');
        }

        // メール認証済みでない場合は認証ページへ遷移
        return view('auth.verify_email');
    }

    // 認証メール送信処理
    public function notification(Request $request)
    {
        $user = $request->user();
        // 既にメール認証済みの場合はそのままホーム画面へ遷移
        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::MYPAGE)->with('result', 'ログインしました');
        }

        // 認証メールを送信
        $user->sendEmailVerificationNotification();

        return redirect()->back()->with('result', 'verification-link-sent');
    }

    // メール認証処理
    public function verification(Request $request)
    {
        $user = $request->user();
        // 既にメール認証済みの場合はそのままホーム画面へ遷移
        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::MYPAGE)->with('result', 'ログインしました');
        }

        // メール認証済みでない場合はemail_verified_atカラムに認証日時を入力後にThanksページへ遷移
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }
        return redirect()->intended(RouteServiceProvider::THANKS . '?verified=1');
    }
}
