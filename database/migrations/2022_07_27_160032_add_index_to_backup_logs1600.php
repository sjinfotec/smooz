<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToBackupLogs1600 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backup_logs', function (Blueprint $table) {
            $table->unique('seq','seq_unique');
       });
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('backup_logs', function (Blueprint $table) {
            $table->dropUnique('seq_unique');
        });
    }
}
