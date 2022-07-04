<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsBindingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations_binding', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->char('m_code', 10)->nullable(false)->comment('見積番号');
            $table->char('sei_time', 4)->nullable()->comment('完結時刻');
            $table->char('sei_chouai', 1)->nullable()->comment('丁合');
            $table->string('sei_chouai_outsou', 34)->nullable()->comment('外注先');
            $table->integer('sei_chouai_outsou_cost')->nullable()->comment('外注費');
            $table->char('sei_dansai', 1)->nullable()->comment('断裁');
            $table->string('sei_dansai_outsou', 34)->nullable()->comment('外注先');
            $table->integer('sei_dansai_outsou_cost')->nullable()->comment('外注費');
            $table->char('sei_marble', 1)->nullable()->comment('マーブル');
            $table->char('sei_cross', 1)->nullable()->comment('クロス');
            $table->char('sei_mat_maki_cardboard', 1)->nullable()->comment('下敷巻ボール');
            $table->char('sei_mat_cardboard', 1)->nullable()->comment('下敷ボール');
            $table->char('sei_nori', 1)->nullable()->comment('糊');
            $table->char('sei_tsuduri', 1)->nullable()->comment('綴');
            $table->char('sei_kurumi', 1)->nullable()->comment('くるみ');
            $table->char('sei_laminate', 1)->nullable()->comment('ラミネート');
            $table->integer('sei_laminate_through')->nullable()->comment('ラミネート通し');
            $table->char('sei_buster', 1)->nullable()->comment('バスター');
            $table->char('sei_crimping', 1)->nullable()->comment('圧着');
            $table->char('sei_musen_tozi', 1)->nullable()->comment('無線トジ');
            $table->string('sei_musen_tozi_outsou', 34)->nullable()->comment('外注先');
            $table->integer('sei_musen_tozi_outsou_cost')->nullable()->comment('外注費');
            $table->char('sei_naka_tozi', 1)->nullable()->comment('中トジ');
            $table->string('sei_naka_tozi_outsou', 34)->nullable()->comment('外注先');
            $table->integer('sei_naka_tozi_outsou_cost')->nullable()->comment('外注費');
            $table->char('sei_sashikomi', 1)->nullable()->comment('差込');
            $table->string('sei_sashikomi_outsou', 34)->nullable()->comment('外注先');
            $table->integer('sei_sashikomi_outsou_cost')->nullable()->comment('外注費');
            $table->tinyInteger('sei_ana')->nullable()->comment('穴数');
            $table->tinyInteger('sei_part')->nullable()->comment('ヶ所');
            $table->char('sei_donko', 1)->nullable()->comment('ドンコ');
            $table->tinyInteger('sei_ori_w')->nullable()->comment('折回数横');
            $table->tinyInteger('sei_ori_h')->nullable()->comment('折回数縦');
            $table->integer('sei_obi')->nullable()->comment('帯');
            $table->char('sei_bara', 1)->nullable()->comment('バラ');
            $table->char('sei_oneset', 1)->nullable()->comment('ワンセット');
            $table->char('sei_obake', 1)->nullable()->comment('オバケ');
            $table->char('sei_otoshi', 1)->nullable()->comment('落とし');
            $table->tinyInteger('sei_otoshi_part')->nullable()->comment('落としヶ所');
            $table->integer('sei_package')->nullable()->comment('梱装');
            $table->integer('sei_package_num')->nullable()->comment('梱装個');
            $table->integer('sei_box')->nullable()->comment('箱');
            $table->integer('sei_box_num')->nullable()->comment('箱個');
            $table->char('sei_a_system', 1)->nullable()->comment('A式');
            $table->char('sei_c_system', 1)->nullable()->comment('C式');
            $table->char('sei_vinyl', 1)->nullable()->comment('ビニール');
            $table->string('sei_all_outsou', 34)->nullable()->comment('外注先');
            $table->integer('sei_all_outsou_cost')->nullable()->comment('外注費');
            $table->integer('sei_subtotal')->nullable()->comment('製本部工賃小計');
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
        Schema::dropIfExists('quotations_binding');
    }
}
