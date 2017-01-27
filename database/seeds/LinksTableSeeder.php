<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'name' => 'tommywhy.tk',
                'title' => 'tommy的portfolio',
                'url' => 'tommywhy.tk/',
                'order_by' => '1',
            ],
            [
                'name' => str_random(10),
                'title' => str_random(10),
                'url' => str_random(10),
                'order_by' => '2',
            ],
        ];
        DB::table('links')->insert($data);
    }
}
