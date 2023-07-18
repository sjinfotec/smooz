<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnWrkQuotationsParts202307101131 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('wrk_quotations_parts', function (Blueprint $table) {
            $table->string('p_info_toray',2)->nullable()->comment('東レ台数')->change();
            $table->string('p_info_ijp',2)->nullable()->comment('フォーム ＩＪＰ台数')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
