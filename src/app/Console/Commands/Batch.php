<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Batch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'リマインドメール送信';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // 予約日が今日のレコードを抽出
        $today = Carbon::today();
        $reservations = Reservation::join('users', 'users.id', '=', 'user_id')->join('shops', 'shops.id', '=', 'shop_id')->whereDate('reserve_datetime', $today)->select('user_id', 'name', 'email', 'shop_name','reserve_datetime','reserve_number')->get();
        // 予約日が今日のレコードを持つユーザにリマインドメールを送信
        foreach ($reservations as $reservation) {
            Mail::send('reminder',['reservation' => $reservation], function ($message) use ($reservation) {
                $message->to($reservation->email)->subject('【Rese】ご予約当日リマインドメール');
            });
        }
    }
}
