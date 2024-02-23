<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //権限を作成するためにroleカラムを追加。デフォルトは0(一般ユーザ用)とする。
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('role')->default(0)->after('password');
        });
        //店舗代表者用に、店舗を割り当てるためのカラムを追加。
        Schema::table('users', function (Blueprint $table) {
            $table->Integer('owner_shop_id')->after('role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('owner_shop_id');
        });
    }
}
