<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('prefecture_id')->nullable(); // カラムを追加
            $table->foreign('prefecture_id')->references('id')->on('prefectures')->onDelete('cascade'); // 外部キー制約の追加
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['prefecture_id']); // 外部キー制約の削除
            $table->dropColumn('prefecture_id'); // カラムの削除
        });
    }
};