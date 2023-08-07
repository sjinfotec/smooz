<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToBackupAttribute202307231814 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backup_attribute', function (Blueprint $table) {
            $table->index(['identification_id', 'identification_code'],'identification_id_identification_code_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('backup_attribute', function (Blueprint $table) {
            //
        });
    }
}
