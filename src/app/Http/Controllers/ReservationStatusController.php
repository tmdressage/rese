<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ReservationStatusController extends Controller
{
    public function getReservationStatus()
    {
        $user = Auth::User();
        $ownerShopId = $user->owner_shop_id;
        $ownerShop = Shop::find($ownerShopId);

        if (isset($ownerShop)) {

            $reservations = Reservation::join('users', 'users.id', '=', 'user_id')->join('shops', 'shops.id', '=', 'shop_id')->where('shop_id', $ownerShopId)->orderby('reserve_datetime', 'ASC')->select('name', 'shop_name', 'reserve_datetime', 'reserve_number')->get();

            return view('owner.reservation_status', compact('reservations', 'ownerShop'));
        } else {

            return redirect('owner')->with('error', 'まだ店舗情報が登録されていません');
        }
    }
}
