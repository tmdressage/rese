<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;

class ChangeController extends Controller
{
    public function getChange($id, $shop_id)
    {    
        $reservation = Reservation::find($id);
        $shop = Shop::find($shop_id);

        if (!$reservation) {
            return Redirect('/mypage')->with('result', '選択した飲食店の予約情報が登録されていません');
            // もしDB上で飲食店の予約レコードが見つからない場合はマイページでエラーメッセージを表示
        } else {

            return view('change', compact('reservation', 'shop'));
        }
    } 

    public function postReservationChange($id, ReservationRequest $request)
    {

        $date = $request->input('reserve_date');
        $time = $request->input('reserve_time');
        // dateとtimeを合成してdatetimeに変換
        $dateTime = $date . ' ' . $time;

        try {
            Reservation::where('id', $id)->update(              
                [
                'reserve_datetime' => $dateTime,
                'reserve_number' => $request->reserve_number
            ]);
            return redirect('done');
        } catch (\Throwable $th) {
            return redirect('mypage')->with('result', '予期せぬエラーが発生しました');
        }
    }
}
