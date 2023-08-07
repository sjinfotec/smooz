<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueToGeneralcodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('generalcodes', function (Blueprint $table) {
            $table->unique(['identification_id','code','sort_seq'],'identification_id_code_sort_seq_index');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('generalcodes', function (Blueprint $table) {
            $table->dropUnique('identification_id_code_sort_seq_index');
            //
        });
    }
}
