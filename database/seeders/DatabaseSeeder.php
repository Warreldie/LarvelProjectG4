<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // CollectionSeeder::class,
            //UserSeeder::class
        ]);
        // \App\Models\Nft::factory(10)->create();
        \App\Models\Comment::factory(3)->create();
    }
}
