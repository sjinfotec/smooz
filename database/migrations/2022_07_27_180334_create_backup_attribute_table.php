<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackupAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backup_attribute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('backupno')->comment('バックアップ属性NO');
            $table->unsignedInteger('seq')->comment('バックアップ属性NO順番');
            $table->char('identification_id', 4)->comment('識別');
            $table->unsignedInteger('identification_code')->comment('識別コード');
            $table->string('work_table')->nullable()->comment('作業テーブル');
            $table->string('target_table', 2)->nullable()->comment('対象テーブル');
            $table->char('status', 1)->nullable()->comment('ステータス');
            $table->string('created_user', 10)->nullable()->comment('作成ユーザー');
            $table->string('updated_user', 10)->nullable()->comment('修正ユーザー');
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
        Schema::dropIfExists('backup_attribute');
    }
}
