<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'name' => 'รถคันที่ 1',
            'name_driver' => 'นายเริงศักดิ์ คำโสภา',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('cars')->insert([
            'name' => 'รถคันที่ 2',
            'name_driver' => 'นายเฉลิม อยู่เป็นลุง',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
