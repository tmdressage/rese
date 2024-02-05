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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {

    #ホーム画面（ログイン時）
    Route::get('/', [HomeController::class, 'getHome']);
    Route::get('/select', [HomeController::class, 'getSelect']);
    
    #お気に入り機能（ログイン時）
    Route::post('/favorite/:{id}', [FavoriteController::class, 'postFavorite'])->name('favorite');
    
    #マイページ画面（ログイン時）
    Route::get('/mypage', [MypageController::class, 'getMypage']);
    Route::post('/cancel/:{id}', [MypageController::class, 'postCancel'])->name('cancel');

    #予約変更画面（ログイン時）
    Route::get('/change/:{id}/:{shop_id}', [ChangeController::class, 'getChange'])->name('change'); 
    Route::post('/reservation/change/:{id}', [ChangeController::class, 'postReservationChange'])->name('reservation_change');

    #レビュー投稿画面（ログイン時）
    Route::get('/review/:{id}/:{shop_id}', [ReviewController::class, 'getReview'])->name('review');
    Route::post('/reviewed/:{shop_id}', [ReviewController::class, 'postReviewed'])->name('reviewed');

    #レビュー閲覧画面（ログイン時）
    Route::get('/review/read/:{id}', [ReviewReadController::class, 'getReviewRead'])->name('review_read');

    #ログアウト（ログイン時）
    Route::get('/logout', [AuthController::class, 'getLogout']);

    #予約完了画面（ログイン時）   
    Route::get('/done', [DoneController::class, 'getDone']);
    Route::post('/done', [DoneController::class, 'postDone']);

    #飲食店詳細画面（ログイン時）
    Route::get('/detail/:{id}', [DetailController::class, 'getDetail'])->name('detail');    
    Route::post('/reservation/:{id}', [DetailController::class, 'postReservation'])->name('reservation');

    #会員登録完了画面（ログイン時）
    Route::get('/thanks', [AuthController::class, 'getThanks']);

    #会員登録完了画面の時点でログインしてしまうので、
    #そのページからmenuでHomeまたはRegistrationを選んだ時は一旦ログアウトしてから遷移する
    Route::get('/logout_getHome', [HomeController::class, 'logout_getHome']);
    Route::get('/logout_getRegister', [AuthController::class, 'logout_getRegister']);

});

#ログインしていないユーザが認証後のページに入ろうとすると、
#Authenticate.phpで指定されたページ(login)に自動で飛ばされる
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);

#会員登録画面
Route::get('/register', [AuthController::class, 'getRegister']);
Route::post('/register', [AuthController::class, 'postRegister']);

#ホーム画面（未ログイン時）
Route::get('/', [HomeController::class, 'getHome']);
Route::get('/select', [HomeController::class, 'getSelect']);

#飲食店詳細画面（未ログイン時）
Route::get('/detail/:{id}', [DetailController::class, 'getDetail'])->name('detail');











