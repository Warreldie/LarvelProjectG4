<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User();
        $user->name = "Fluppe";
        $user->email = "fluppe@test.com";
        $user->password = "12345";
        $user->save();

        $user2 = new \App\Models\User();
        $user2->name = "Glenn";
        $user2->email = "glenn@test.com";
        $user2->password = "12345";
        $user2->save();

        $user3 = new \App\Models\User();
        $user3->name = "Ward";
        $user3->email = "ward@test.com";
        $user3->password = "12345";
        $user3->save();

        $user4 = new \App\Models\User();
        $user4->name = "aaron";
        $user4->email = "aaron@test.com";
        $user4->password = "12345";
        $user4->save();
    }
}
