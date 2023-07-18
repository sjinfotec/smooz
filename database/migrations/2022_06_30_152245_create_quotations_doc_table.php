<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsDocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations_doc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('wm_code', 14)->nullable(false)->comment('見積書番号');
            $table->char('o_wm_code', 12)->nullable()->comment('旧見積書番号');
            $table->string('user_code', 2)->nullable()->comment('オペレーター');
            $table->char('create_date', 8)->nullable()->comment('作成日');
            $table->string('customer_code', 5)->nullable()->comment('得意先コード');
            $table->string('customer', 44)->nullable()->comment('得意先名');
            $table->string('issue_date', 18)->nullable()->comment('発行日付');
            $table->string('deadline', 40)->nullable()->comment('納期');
            $table->string('expiration', 40)->nullable()->comment('見積有効期限');
            $table->string('terms_payment', 40)->nullable()->comment('支払い条件');
            $table->string('delivery_site', 40)->nullable()->comment('納入場所');
            $table->char('format_mode', 1)->nullable()->comment('形式モード');
            $table->integer('q_amount')->nullable()->comment('見積製作金額');
            $table->integer('tax')->nullable()->comment('消費税');
            $table->string('comment_1', 50)->nullable()->comment('コメント1');
            $table->string('comment_2', 50)->nullable()->comment('コメント2');
            $table->string('comment_3', 50)->nullable()->comment('コメント3');
            $table->string('comment_4', 50)->nullable()->comment('コメント4');
            $table->integer('discount_amount')->nullable()->comment('値引き額');
            $table->string('discount_comment', 18)->nullable()->comment('値引きコメント');
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
        Schema::dropIfExists('quotations_doc');
    }
}
