<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWrkQuotationsCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wrk_quotations_cost', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('m_code', 10)->nullable(false)->comment('見積番号');
            $table->integer('send_city')->nullable()->comment('市内個');
            $table->integer('send_in_dou')->nullable()->comment('道内個');
            $table->integer('send_out_dou')->nullable()->comment('道外個');
            $table->integer('send_out_dou_yen')->nullable()->comment('道外単価￥');
            $table->integer('send_all')->nullable()->comment('一括配送￥');
            $table->integer('send_subtotal')->nullable()->comment('配送費小計');
            $table->string('inside_hand_work', 44)->nullable()->comment('手作業');
            $table->integer('inside_insourcing_cost')->nullable()->comment('内製費');
            $table->string('outside_job1', 12)->nullable()->comment('社外内職');
            $table->string('outside_job1_outsou', 16)->nullable()->comment('外注先');
            $table->integer('outside_job1_outsou_cost')->nullable()->comment('外注費');
            $table->string('outside_job2', 12)->nullable()->comment('社外内職');
            $table->string('outside_job2_outsou', 16)->nullable()->comment('外注先');
            $table->integer('outside_job2_outsou_cost')->nullable()->comment('外注費');
            $table->integer('outside_subtotal')->nullable()->comment('社外内職外注小計');
            $table->string('addition_cost1', 60)->nullable()->comment('付加費用コメント1');
            $table->integer('addition_cost1_buy')->nullable()->comment('購入費1');
            $table->string('addition_cost2', 60)->nullable()->comment('付加費用コメント2');
            $table->integer('addition_cost2_buy')->nullable()->comment('購入費2');
            $table->string('addition_cost3', 60)->nullable()->comment('付加費用コメント3');
            $table->integer('addition_cost3_buy')->nullable()->comment('購入費3');
            $table->string('addition_cost4', 60)->nullable()->comment('付加費用コメント4');
            $table->integer('addition_cost4_buy')->nullable()->comment('購入費4');
            $table->string('addition_cost5', 60)->nullable()->comment('付加費用コメント5');
            $table->integer('addition_cost5_buy')->nullable()->comment('購入費5');
            $table->integer('addition_subtotal')->nullable()->comment('附加費用金額小計');
            $table->string('product_all_outsou1', 34)->nullable()->comment('外注先1');
            $table->integer('product_all_outsou1_cost')->nullable()->comment('外注費1');
            $table->string('product_all_outsou2', 34)->nullable()->comment('外注先2');
            $table->integer('product_all_outsou2_cost')->nullable()->comment('外注費2');
            $table->string('product_all_outsou3', 34)->nullable()->comment('外注先3');
            $table->integer('product_all_outsou3_cost')->nullable()->comment('外注費3');
            $table->integer('product_all_subtotal')->nullable()->comment('全体の外注合計');
            $table->integer('paper_amount')->nullable()->comment('用紙代総額');
            $table->integer('wages_amount')->nullable()->comment('工賃他総額');
            $table->integer('cost_amount')->nullable()->comment('実質原価総額');
            $table->integer('estimate_amount')->nullable()->comment('見積予定金額');
            $table->string('comment', 255)->nullable()->comment('コメント');
            $table->integer('offered_amount')->nullable()->comment('提示額');
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
        Schema::dropIfExists('wrk_quotations_cost');
    }
}
