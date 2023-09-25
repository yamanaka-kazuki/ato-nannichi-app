<?php

use App\Item;
use Illuminate\Database\Seeder;

class GoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Item::create([
                'title' => '2023年の目標' . $i,
                'deadline' => date('y-m-d'),
            ]);
        }
    }
}
