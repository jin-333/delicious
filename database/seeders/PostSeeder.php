<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('posts')->insert([
           'title' => '美味しいラーメンのお店',
           'body' => '駅に近いのでおすすめ！',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           ]);
   
    }
}
