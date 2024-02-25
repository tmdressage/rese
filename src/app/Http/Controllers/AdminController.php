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

            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => '2',
            ]);

            // ログインせずに登録だけ行い終了。
            // 店舗代表者としてログインする際にメール認証ページへ遷移。
            return redirect('admin')->with('result', '店舗代表者を登録しました。利用するには、登録したアカウントでログインしてメール認証を行ってください。');
        } catch (\Throwable $th) {
            return redirect('admin')->with('error', '予期せぬエラーが発生しました');
        }
    }
}
