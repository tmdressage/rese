<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function getAdmin()
    {
        $users = User::where('role', '=', '2')->orderby('owner_shop_id', 'ASC')->get();


        return view('admin.admin', compact('users'));
    }

    public function postAdmin(AdminRequest $request)
    {
        try {

            $lastUser = User::orderBy('owner_shop_id', 'DESC')->latest()->first();
            $ownerShopId = $lastUser->owner_shop_id + 1;
            // 店舗代表者ごとに店舗割り当てIDを採番。この値と同じshop_idを持つ店舗情報だけを操作可能にする。
            // 採番方法は現データにある最大値＋1で設定。
            //（複数人が同時に管理者でログインし、同じタイミングで重複して採番されることは無い、という想定の為。）

            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => '2',
                'owner_shop_id' => $ownerShopId
            ]);

            // ログインせずに登録だけ行い終了。
            // 店舗代表者としてログインする際にメール認証ページへ遷移。
            return redirect('admin')->with('result', '店舗代表者を登録しました。利用するには、登録したアカウントでログインしてメール認証を行ってください。');
        } catch (\Throwable $th) {
            return redirect('admin')->with('error', '予期せぬエラーが発生しました');
        }
    }
}
