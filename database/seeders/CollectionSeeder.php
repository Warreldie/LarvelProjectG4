<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = new \App\Models\Collection();
        $collection->title = "Collection1";
        $collection->description = "L.Ipsum";
        $collection->save();

        $collection2 = new \App\Models\Collection();
        $collection2->title = "Collection2";
        $collection2->description = "L.Ipsum";
        $collection2->save();

        $collection3 = new \App\Models\Collection();
        $collection3->title = "Collection3";
        $collection3->description = "L.Ipsum";
        $collection3->save();

        $collection4 = new \App\Models\Collection();
        $collection4->title = "Collection4";
        $collection4->description = "L.Ipsum";
        $collection4->save();

        $collection5 = new \App\Models\Collection();
        $collection5->title = "Collection5";
        $collection5->description = "L.Ipsum";
        $collection5->save();
    }
}
