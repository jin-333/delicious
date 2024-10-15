<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => '和食'],
            ['name' => '中華'],
            ['name' => 'イタリアン'],
            ['name' => 'フレンチ'],
            ['name' => 'インド料理'],
            ['name' => 'メキシコ料理'],
            ['name' => 'アメリカ料理'],
            ['name' => '韓国料理'],
            ['name' => 'タイ料理'],
            ['name' => 'ベトナム料理'],
            ['name' => '肉料理'],
            ['name' => '魚料理'],
            ['name' => '麺料理']
            
            ]);
        //
    }
}
