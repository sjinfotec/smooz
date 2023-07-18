<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnBackupLogsTable1553 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backup_logs', function (Blueprint $table) {
            $table->unsignedInteger('seq')->after('id')->comment('log連番');
            $table->text('start_date',8)->nullable()->after('status')->comment('開始年月日');
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
            $table->dropColumn('seq');
            $table->dropColumn('start_date');
        });
        //
    }
}
