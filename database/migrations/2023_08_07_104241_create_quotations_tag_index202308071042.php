<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTagIndex202308071042 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations_tag_index', function (Blueprint $table) {
            $table->id();
            $table->char('code', 12)->comment('作成日yymmdd＋見積番号');
            $table->integer('pos')->nullable()->comment('レコード開始位置　増分は2480');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations_tag_index');
    }
}
