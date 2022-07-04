<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations_department', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->char('m_code', 10)->nullable(false)->comment('見積番号');
            $table->char('wkake', 1)->nullable()->comment('Ｗ掛け');
            $table->char('daenpin', 1)->nullable()->comment('楕円ピン');
            $table->char('ana2', 1)->nullable()->comment('２穴');
            $table->char('ana6', 1)->nullable()->comment('６穴');
            $table->char('donko', 1)->nullable()->comment('ドンコ');
            $table->char('katanuki', 1)->nullable()->comment('型ヌキ');
            $table->string('katanuki_outsou', 34)->nullable()->comment('外注先');
            $table->integer('katanuki_outsou_cost')->nullable()->comment('外注費');
            $table->char('kasutori', 1)->nullable()->comment('カス取');
            $table->string('kasutori_outsou', 34)->nullable()->comment('外注先');
            $table->integer('kasutori_outsou_cost')->nullable()->comment('外注費');
            $table->char('nisu_single', 1)->nullable()->comment('ニス片面');
            $table->char('nisu_double', 1)->nullable()->comment('ニス両面');
            $table->tinyInteger('tsr_times')->nullable()->comment('ＴＳＲスキップ回');
            $table->integer('tsr_through')->nullable()->comment('ＴＳＲスキップ通');
            $table->tinyInteger('form_color_change')->nullable()->comment('色替');
            $table->tinyInteger('form_carbon_mold')->nullable()->comment('カーボン型');
            $table->string('form_all_outsou', 34)->nullable()->comment('外注先');
            $table->integer('form_all_outsou_cost')->nullable()->comment('外注費');
            $table->integer('form_subtotal')->nullable()->comment('フォーム部工賃小計');
            $table->tinyInteger('offset_color_change')->nullable()->comment('色替');
            $table->tinyInteger('offset_carbon_mold')->nullable()->comment('カーボン型');
            $table->integer('offset_subtotal')->nullable()->comment('オフセット部工賃小計');
            $table->char('block_copy', 1)->nullable()->comment('版下');
            $table->char('kinds', 1)->nullable()->comment('種別');
            $table->char('difficulty', 1)->nullable()->comment('難度');
            $table->string('plate_making_outsou', 34)->nullable()->comment('外注先');
            $table->integer('plate_making_outsou_cost')->nullable()->comment('外注費');
            $table->integer('ctp')->nullable()->comment('ＣＴＰ');
            $table->char('inkjet', 1)->nullable()->comment('インクジェット');
            $table->tinyInteger('inkjet_sheet')->nullable()->comment('インクジェット枚');
            $table->tinyInteger('ondemand_color_front')->nullable()->comment('オンデマンド 色数表');
            $table->tinyInteger('ondemand_color_back')->nullable()->comment('オンデマンド 色数裏');
            $table->integer('ondemand_through_front')->nullable()->comment('オンデマンド 通し表');
            $table->integer('ondemand_through_back')->nullable()->comment('オンデマンド 通し裏');
            $table->integer('plate_subtotal')->nullable()->comment('組版・製版工賃小計');
            $table->tinyInteger('collator')->nullable()->comment('コレーター');
            $table->tinyInteger('bebe')->nullable()->comment('ベーベ');
            $table->char('envelope_process', 1)->nullable()->comment('封筒加工');
            $table->char('tape_process', 1)->nullable()->comment('テープ加工');
            $table->char('peel', 1)->nullable()->comment('剥離糊');
            $table->char('press', 1)->nullable()->comment('プレス');
            $table->char('sheetcut', 1)->nullable()->comment('シートカット');
            $table->tinyInteger('collator_cno')->nullable()->comment('クラッシュNo.');
            $table->tinyInteger('collator_ana')->nullable()->comment('穴');
            $table->string('collator_all_outsou', 34)->nullable()->comment('外注先');
            $table->integer('collator_all_outsou_cost')->nullable()->comment('外注費');
            $table->integer('collator_subtotal')->nullable()->comment('コレータ部工賃小計');
            $table->integer('collator_basic_fee')->nullable()->comment('コレータ部基本料金');
            $table->tinyInteger('nl_color')->nullable()->comment('名刺色');
            $table->char('nl_hagaki', 1)->nullable()->comment('ハガキ');
            $table->tinyInteger('nl_hagaki_color')->nullable()->comment('ハガキ色');
            $table->tinyInteger('nl_envelope_color')->nullable()->comment('封筒色');
            $table->tinyInteger('nl_number_part')->nullable()->comment('No.');
            $table->integer('nl_subtotal')->nullable()->comment('ネームライナー工賃小計');
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
        Schema::dropIfExists('quotations_department');
    }
}
