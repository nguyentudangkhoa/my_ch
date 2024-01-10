<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('old_data_my_ch')->table('table_user')->orderBy('id')->chunk(100, function ($users) {
            foreach ($users as $user) {
                DB::table('users')->insert([
                    'id' => $user->id,
                    'daily_id' => $user->id_daily,
                    'role' => $user->role,
                    'user_name' => $user->username,
                    'password' => $user->password,
                    'name' => $user->ten,
                    'sex' => $user->sex,
                    'yahoo' => $user->nick_yahoo,
                    'skype' => $user->nick_skype,
                    'com' => $user->com,
                    'display' => $user->hienthi,
                    'priority' => $user->stt,
                ]);
            }
        });
    }
}
