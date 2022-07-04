<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWrkQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wrk_quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_code', 2)->nullable()->comment('オペレータＩＤ');
            $table->char('m_code', 10)->nullable(false)->comment('見積番号');
            $table->char('wm_code', 14)->nullable()->comment('見積書番号');
            $table->char('wm_sub', 2)->nullable()->comment('見積書補完番号');
            $table->char('reference_num', 10)->nullable()->comment('参照番号');
            $table->char('create_date', 8)->nullable()->comment('作成日');
            $table->char('lastorder_date', 8)->nullable()->comment('最終受注日');
            $table->string('number_order', 4)->nullable()->comment('受注回数');
            $table->string('manager_code', 4)->nullable()->comment('担当者コード');
            $table->string('manager', 16)->nullable()->comment('担当者');
            $table->string('customer_code', 5)->nullable()->comment('得意先コード');
            $table->string('customer', 44)->nullable()->comment('得意先');
            $table->char('printing', 1)->nullable()->comment('印刷無しマーク');
            $table->string('enduser', 40)->nullable()->comment('エンドユーザー');
            $table->string('product', 50)->nullable()->comment('製品名');
            $table->integer('production_setnum')->nullable()->comment('制作組数（束ね内数）');
            $table->char('production_setnum_unit', 1)->nullable()->comment('組/帯の区分');
            $table->integer('production_volnum')->nullable()->comment('制作冊数');
            $table->char('production_volnum_unit', 1)->nullable()->comment('制作形態');
            $table->integer('production_all')->nullable()->comment('総数量（組×冊）');
            $table->char('unit', 1)->nullable()->comment('単位区分（インチ/ミリ）');
            $table->tinyInteger('papertray')->nullable()->comment('紙取');
            $table->tinyInteger('imposition_w')->nullable()->comment('面付け横');
            $table->tinyInteger('imposition_h')->nullable()->comment('面付け縦');
            $table->string('cylinder', 2)->nullable()->comment('シリンダー種');
            $table->tinyInteger('cylinder_num')->nullable()->comment('シリンダー本');
            $table->integer('cylinder_set')->nullable()->comment('シリンダーセット代金');
            $table->decimal('size_w', 5, 1)->nullable()->comment('サイズ横');
            $table->decimal('size_h', 5, 1)->nullable()->comment('サイズ縦');
            $table->tinyInteger('size_top')->nullable()->comment('サイズ分子');
            $table->tinyInteger('size_bottom')->nullable()->comment('サイズ分母');
            $table->string('inch_fold', 2)->nullable()->comment('インチ折');
            $table->tinyInteger('parts_num')->nullable()->comment('パーツ数');
            $table->integer('all_through')->nullable()->comment('総通し数');
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
        Schema::dropIfExists('wrk_quotations');
    }
}
