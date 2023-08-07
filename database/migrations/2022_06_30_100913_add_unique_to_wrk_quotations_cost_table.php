<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueToWrkQuotationsCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wrk_quotations_cost', function (Blueprint $table) {
            $table->unique(['m_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wrk_quotations_cost', function (Blueprint $table) {
            $table->dropUnique(['m_code']);
        });
    }
}
