<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnBackupAttributeTable1836 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backup_attribute', function (Blueprint $table) {
            $table->boolean('is_deleted')->nullable()->after('updated_at')->comment('削除フラグ')->default(0);
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
            $table->dropColumn('is_deleted');
        });
    }
}
