<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ChangeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewReadController;
use App\Http\Controllers\EmailVerificationController;


// メール認証関連のルート
Route::controller(EmailVerificationController::class)
    ->prefix('email')->name('verification.')->group(function () {
        Route::get('/verify', 'verify')->name('notice');
        Route::post('/notification', 'notification')
            ->middleware('throttle:6,1')->name('send');
        Route::get('/verification/{id}/{hash}', 'verification')
            ->middleware(['signed', 'throttle:6,1'])->name('verify');
    });

// ログイン後(認証後)のルート
Route::middleware('web', 'verified', 'auth')->group(function () {

    // 飲食店一覧（＝ホーム）
    Route::get('/', [HomeController::class, 'getHome']);
    Route::get('/select', [HomeController::class, 'getSelect']);

    // お気に入り
    Route::post('/favorite/:{shop_id}', [FavoriteController::class, 'postFavorite'])->name('favorite');

    // マイページ
    Route::get('/mypage', [MypageController::class, 'getMypage']);
    Route::post('/mypage/cancel/:{reservation_id}', [MypageController::class, 'postCancel'])->name('cancel');

    // 予約変更
    Route::get('/change/:{reservation_id}/:{shop_id}', [ChangeController::class, 'getChange'])->name('change');
    Route::post('/changed/:{reservation_id}', [ChangeController::class, 'postChange'])->name('changed');

    // レビュー投稿
    Route::get('/review/:{reservation_id}/:{shop_id}', [ReviewController::class, 'getReview'])->name('review');
    Route::post('/reviewed/:{shop_id}', [ReviewController::class, 'postReview'])->name('reviewed');

    // レビュー閲覧
    Route::get('/review/read/:{shop_id}', [ReviewReadController::class, 'getReviewRead'])->name('review_read');

    // ログアウト
    Route::get('/logout', [AuthController::class, 'getLogout']);

    // 予約完了   
    Route::get('/done', [DoneController::class, 'getDone']);
    Route::post('/done', [DoneController::class, 'postDone']);

    // 飲食店詳細
    Route::get('/detail/:{shop_id}', [DetailController::class, 'getDetail'])->name('detail');
    Route::post('/detail/reservation/:{shop_id}', [DetailController::class, 'postDetail'])->name('reservation');

    // 会員登録完了
    Route::get('/thanks', [AuthController::class, 'getThanks']);

    // 飲食店一覧(一旦ログアウトしてから)
    Route::get('/logout_getHome', [HomeController::class, 'logoutGetHome']);

    // 会員登録(一旦ログアウトしてから)
    Route::get('/logout_getRegister', [AuthController::class, 'logoutGetRegister']);
});


//ログイン
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
//ログインしていないユーザが認証後のルートに入ろうとすると、
//Authenticate.phpで指定されたページ(login)に自動で飛ばされる

Route::post('/login', [AuthController::class, 'postLogin']);

//会員登録
Route::get('/register', [AuthController::class, 'getRegister']);
Route::post('/register', [AuthController::class, 'postRegister']);

//飲食店一覧（未ログイン時）
Route::get('/', [HomeController::class, 'getHome']);
Route::get('/select', [HomeController::class, 'getSelect']);

//飲食店詳細（未ログイン時）
Route::get('/detail/:{shop_id}', [DetailController::class, 'getDetail'])->name('detail');
