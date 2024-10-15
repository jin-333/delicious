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
           'user_id' => 1,
           'category_id' => 2,
           'title' => '美味しいラーメンのお店',
           'body' => '駅に近いのでおすすめ！',
           'image_url' => 'https://res.cloudinary.com/dt9um5e5g/image/upload/v1727772401/swtlnvdinxltvfwkiejw.jpg',
           'full_address' =>'東京都千代田区千代田1-1',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           ]);
           
           DB::table('posts')->insert([
           'user_id' => 1,
           'category_id' => 4,
           'title' => '和食のお店',
           'body' => '安い',
           'image_url' => 'https://res.cloudinary.com/dt9um5e5g/image/upload/v1727772401/swtlnvdinxltvfwkiejw.jpg',
           'full_address' =>'大阪府大阪市浪速区恵美須東1-18-6',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           ]);
           
           DB::table('posts')->insert([
           'user_id' => 1,
           'category_id' => 1,
           'title' => 'とんかつ',
           'body' => '景色がいい',
           'image_url' => 'https://res.cloudinary.com/dt9um5e5g/image/upload/v1727772401/swtlnvdinxltvfwkiejw.jpg',
           'full_address' =>'熊本県熊本市中央区本丸1-1',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           ]);
           
           DB::table('posts')->insert([
           'user_id' => 1,
           'category_id' => 5,
           'title' => '美味しいラーメンのお店',
           'body' => '駅に近いのでおすすめ！',
           'image_url' => 'https://res.cloudinary.com/dt9um5e5g/image/upload/v1727772401/swtlnvdinxltvfwkiejw.jpg',
           'full_address' =>'宮城県仙台市青葉区中央1丁目',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           ]);
           
           DB::table('posts')->insert([
           'user_id' => 1,
           'category_id' => 3,
           'title' => '美味しいラーメンのお店',
           'body' => '駅に近いのでおすすめ！',
           'image_url' => 'https://res.cloudinary.com/dt9um5e5g/image/upload/v1727772401/swtlnvdinxltvfwkiejw.jpg',
           'full_address' =>'東京都墨田区押上1-1-2',
           'created_at' => new Datetime(),
           'updated_at' => new DateTime(),
           ]);
   
    }
}
