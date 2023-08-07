<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerConverts202308031342 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_converts', function (Blueprint $table) {
            $table->id();
            $table->char('code', 6)->comment('新得意先コード');
            $table->char('code_old', 6)->comment('旧得意先コード');
            $table->char('category', 1)->comment('区分');
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
        Schema::dropIfExists('customer_converts');
    }
}
