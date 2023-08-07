<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackupLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backup_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('work_table', 30)->nullable()->comment('作業テーブル');
            $table->string('target_table', 30)->nullable()->comment('対象テーブル');
            $table->string('kind', 20)->nullable()->comment('種類');
            $table->char('status', 1)->nullable()->comment('ステータス 0失敗 1成功');
            $table->char('date', 8)->nullable()->comment('開始年月日');
            $table->char('start_time', 6)->nullable()->comment('開始時間');
            $table->char('end_time', 6)->nullable()->comment('終了時間');
            $table->char('time_required', 6)->nullable()->comment('所要時間');
            $table->string('created_user', 10)->nullable()->comment('作成ユーザー');
            $table->string('updated_user', 10)->nullable()->comment('修正ユーザー');
            $table->timestamps();
            $table->boolean('is_deleted')->nullable()->comment('削除フラグ')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backup_logs');
    }
}
