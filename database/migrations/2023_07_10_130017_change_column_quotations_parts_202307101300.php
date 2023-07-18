<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnQuotationsParts202307101300 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('quotations_parts', function (Blueprint $table) {
            $table->string('p_color_front',2)->nullable()->comment('色数表')->change();
            $table->string('p_color_back',2)->nullable()->comment('フォーム 色数裏')->change();
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
