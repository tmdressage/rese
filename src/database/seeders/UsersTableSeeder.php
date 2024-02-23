<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'システム管理者',
            'email' => 'admin@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '1',
            'owner_shop_id' => '0',
            'remember_token' => 'AdminAdmin',
        ]);

        User::create([
            'name' => '店舗代表者1',
            'email' => 'owner1@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '1',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者2',
            'email' => 'owner2@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '2',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者3',
            'email' => 'owner3@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '3',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者4',
            'email' => 'owner4@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '4',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者5',
            'email' => 'owner5@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '5',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者6',
            'email' => 'owner6@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '6',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者7',
            'email' => 'owner7@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '7',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者8',
            'email' => 'owner8@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '8',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者9',
            'email' => 'owner9@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '9',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者10',
            'email' => 'owner10@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '10',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者11',
            'email' => 'owner11@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '11',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者12',
            'email' => 'owner12@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '12',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者13',
            'email' => 'owner13@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '13',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者14',
            'email' => 'owner14@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '14',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者15',
            'email' => 'owner15@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '15',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者16',
            'email' => 'owner16@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '16',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者17',
            'email' => 'owner17@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '17',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者18',
            'email' => 'owner18@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '18',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者19',
            'email' => 'owner19@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '19',
            'remember_token' => 'OwnerOwner',
        ]);

        User::create([
            'name' => '店舗代表者20',
            'email' => 'owner20@example.co.jp',
            'email_verified_at' => now(),
            'password' => Hash::make('PasswordPassword'),
            'role' => '2',
            'owner_shop_id' => '20',
            'remember_token' => 'OwnerOwner',
        ]);
    }
}
