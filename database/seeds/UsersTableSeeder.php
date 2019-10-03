<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
 
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'kid_test',
            'password' => '123123123',
            'first_name' => 'อชิตะ',
            'last_name' => 'ลิลิตสัจจะ',
            'relationship' => 'พ่อ',
            'address' => 'บ้าน',
            'email' => 'ashita11479@gmail.com',
            'phone' => '0898911553',
            'image' => 'pic A',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'username' => 'blon_test',
            'password' => '11111111',
            'first_name' => 'โกญจนาท',
            'last_name' => 'เกษศิลป์',
            'relationship' => 'พ่อ',
            'address' => 'บ้าน',
            'email' => 'dvver@gmail.com',
            'phone' => '0648763436',
            'image' => 'pic A',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
