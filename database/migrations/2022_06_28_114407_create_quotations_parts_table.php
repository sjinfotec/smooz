<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations_parts', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('user_code', 2)->nullable()->comment('オペレータＩＤ');
            $table->char('m_code', 10)->nullable(false)->comment('見積番号');
            $table->integer('seq')->nullable(false)->comment('行番号');
            $table->string('parts_code', 2)->nullable(false)->comment('パーツコード');
            $table->string('paper_code', 8)->nullable()->comment('用紙コード');
            $table->string('paper_name', 30)->nullable()->comment('用紙名');
            $table->decimal('size_w', 5, 1)->nullable()->comment('サイズ横');
            $table->decimal('size_h', 5, 1)->nullable()->comment('サイズ縦');
            $table->tinyInteger('size_top')->nullable()->comment('サイズ分子');
            $table->tinyInteger('size_bottom')->nullable()->comment('サイズ分母');
            $table->tinyInteger('papertray')->nullable()->comment('紙取');
            $table->tinyInteger('imposition_w')->nullable()->comment('面付け横');
            $table->tinyInteger('imposition_h')->nullable()->comment('面付け縦');
            $table->char('p_envelope', 1)->nullable()->comment('封筒');
            $table->char('p_supply', 1)->nullable()->comment('支給受');
            $table->char('p_desensitization', 1)->nullable()->comment('減感');
            $table->char('p_carbon', 1)->nullable()->comment('カーボン');
            $table->char('p_white', 1)->nullable()->comment('ホワイト');
            $table->char('p_separate', 1)->nullable()->comment('セパレート');
            $table->tinyInteger('p_color_front')->nullable()->comment('色数表');
            $table->tinyInteger('p_color_back')->nullable()->comment('色数裏');
            $table->integer('p_through')->nullable()->comment('通し数');
            $table->integer('p_sheet')->nullable()->comment('実質・ｍ／枚・数');
            $table->integer('p_mm_apply')->nullable()->comment('巻・丸め摘要単位Ｍ数');
            $table->integer('p_mm_dispose')->nullable()->comment('巻・丸め処置後のＭ数');
            $table->decimal('p_mm_unit', 6, 2)->nullable()->comment('巻・丸め品目ｍ単価');
            $table->integer('p_printing_cost')->nullable()->comment('印刷原価');
            $table->integer('p_necessary_sheet')->nullable()->comment('総必要　枚数orＭ数');
            $table->integer('p_paper_price')->nullable()->comment('用紙代金');
            $table->tinyInteger('p_form_sewingmachine_w')->nullable()->comment('ミシン横');
            $table->tinyInteger('p_form_sewingmachine_h')->nullable()->comment('ミシン縦');
            $table->char('p_form_sewingmachine_ks', 1)->nullable()->comment('ミシン基・セ');
            $table->tinyInteger('p_form_jump_sewingmachine_w')->nullable()->comment('ジャンプミシン横');
            $table->tinyInteger('p_form_jump_sewingmachine_h')->nullable()->comment('ジャンプミシン縦');
            $table->char('p_form_jump_sewingmachine_ks', 1)->nullable()->comment('ジャンプミシン基・セ');
            $table->tinyInteger('p_form_micro_sewingmachine_w')->nullable()->comment('マイクロミシン横');
            $table->tinyInteger('p_form_micro_sewingmachine_h')->nullable()->comment('マイクロミシン縦');
            $table->char('p_form_micro_sewingmachine_ks', 1)->nullable()->comment('マイクロミシン基・セ');
            $table->tinyInteger('p_form_jump_micro_sewingmachine_w')->nullable()->comment('ジャンプマイクロミシン横');
            $table->tinyInteger('p_form_jump_micro_sewingmachine_h')->nullable()->comment('ジャンプマイクロミシン縦');
            $table->char('p_form_jump_micro_sewingmachine_ks', 1)->nullable()->comment('ジャンプマイクロミシン基・セ');
            $table->tinyInteger('p_form_linein_w')->nullable()->comment('スジ入れ横');
            $table->tinyInteger('p_form_linein_h')->nullable()->comment('スジ入れ縦');
            $table->char('p_form_linein_ks', 1)->nullable()->comment('スジ入れ基・セ');
            $table->tinyInteger('p_form_slitter_w')->nullable()->comment('スリッター横');
            $table->tinyInteger('p_form_slitter_h')->nullable()->comment('スリッター縦');
            $table->char('p_form_slitter_ks', 1)->nullable()->comment('スリッター基・セ');
            $table->tinyInteger('p_form_no')->nullable()->comment('No.');
            $table->char('p_form_no_ks', 1)->nullable()->comment('No.基・セ');
            $table->tinyInteger('p_form_cornercut')->nullable()->comment('コーナーカット');
            $table->tinyInteger('p_form_replace')->nullable()->comment('差替');
            $table->char('p_form_replace_color', 1)->nullable()->comment('カラー');
            $table->integer('p_form_subtotal')->nullable()->comment('フォーム部工賃小計');
            $table->tinyInteger('p_offset_sewingmachine_w')->nullable()->comment('ミシン');
            $table->char('p_offset_sewingmachine_ks', 1)->nullable()->comment('基・セ');
            $table->tinyInteger('p_offset_no')->nullable()->comment('No.');
            $table->char('p_offset_no_ks', 1)->nullable()->comment('基・セ');
            $table->integer('p_offset_subtotal')->nullable()->comment('オフセット部工賃小計');
            $table->tinyInteger('p_letterpress_sewingmachine_hon')->nullable()->comment('ミシン本');
            $table->tinyInteger('p_letterpress_sewingmachine_dai')->nullable()->comment('ミシン台');
            $table->char('p_letterpress_sewingmachine_ks', 1)->nullable()->comment('ミシン基・セ');
            $table->tinyInteger('p_letterpress_jump_sewingmachine_hon')->nullable()->comment('ジャンプミシン本');
            $table->tinyInteger('p_letterpress_jump_sewingmachine_dai')->nullable()->comment('ジャンプミシン台');
            $table->char('p_letterpress_jump_sewingmachine_ks', 1)->nullable()->comment('ジャンプミシン基・セ');
            $table->tinyInteger('p_letterpress_micro_sewingmachine_hon')->nullable()->comment('マイクロミシン本');
            $table->tinyInteger('p_letterpress_micro_sewingmachine_dai')->nullable()->comment('マイクロミシン台');
            $table->char('p_letterpress_micro_sewingmachine_ks', 1)->nullable()->comment('マイクロミシン基・セ');
            $table->tinyInteger('p_letterpress_jump_micro_sewingmachine_hon')->nullable()->comment('ジャンプマイクロミシン本');
            $table->tinyInteger('p_letterpress_jump_micro_sewingmachine_dai')->nullable()->comment('ジャンプマイクロミシン台');
            $table->char('p_letterpress_jump_micro_sewingmachine_ks', 1)->nullable()->comment('ジャンプマイクロミシン基・セ');
            $table->tinyInteger('p_letterpress_linein_hon')->nullable()->comment('スジ入れ本');
            $table->tinyInteger('p_letterpress_linein_dai')->nullable()->comment('スジ入れ台');
            $table->char('p_letterpress_linein_ks', 1)->nullable()->comment('スジ入れ基・セ');
            $table->tinyInteger('p_letterpress_slitter_hon')->nullable()->comment('スリッター本');
            $table->tinyInteger('p_letterpress_slitter_dai')->nullable()->comment('スリッター台');
            $table->char('p_letterpress_slitter_ks', 1)->nullable()->comment('スリッター基・セ');
            $table->tinyInteger('p_letterpress_diecut')->nullable()->comment('型ヌキ');
            $table->char('p_letterpress_diecut_ks', 1)->nullable()->comment('型ヌキ基・セ');
            $table->tinyInteger('p_letterpress_pcno')->nullable()->comment('親子No.');
            $table->char('p_letterpress_pcno_ks', 1)->nullable()->comment('親子No.基・セ');
            $table->tinyInteger('p_letterpress_no')->nullable()->comment('No.');
            $table->char('p_letterpress_no_ks', 1)->nullable()->comment('No.基・セ');
            $table->integer('p_letterpress_subtotal')->nullable()->comment('活版部工賃小計');
            $table->tinyInteger('p_info_toray')->nullable()->comment('東レ');
            $table->tinyInteger('p_info_dot_line')->nullable()->comment('ドットライン');
            $table->tinyInteger('p_info_dot_dai')->nullable()->comment('ドット台');
            $table->char('p_info_ijp', 1)->nullable()->comment('フォーム ＩＪＰ');
            $table->integer('p_info_basic_fee')->nullable()->comment('基本料金');
            $table->integer('p_info_output')->nullable()->comment('宛名等出力件数');
            $table->integer('p_info_punching')->nullable()->comment('パンチング');
            $table->integer('p_info_subtotal')->nullable()->comment('情報処理工賃小計');
            $table->tinyInteger('p_diecutter_sewingmachine_hon')->nullable()->comment('ミシン本');
            $table->tinyInteger('p_diecutter_sewingmachine_dai')->nullable()->comment('ミシン台');
            $table->char('p_diecutter_sewingmachine_ks', 1)->nullable()->comment('ミシン基・セ');
            $table->tinyInteger('p_diecutter_jump_sewingmachine_hon')->nullable()->comment('ジャンプミシン本');
            $table->tinyInteger('p_diecutter_jump_sewingmachine_dai')->nullable()->comment('ジャンプミシン台');
            $table->char('p_diecutter_jump_sewingmachine_ks', 1)->nullable()->comment('ジャンプミシン基・セ');
            $table->tinyInteger('p_diecutter_micro_sewingmachine_hon')->nullable()->comment('マイクロミシン本');
            $table->tinyInteger('p_diecutter_micro_sewingmachine_dai')->nullable()->comment('マイクロミシン台');
            $table->char('p_diecutter_micro_sewingmachine_ks', 1)->nullable()->comment('マイクロミシン基・セ');
            $table->tinyInteger('p_diecutter_jump_micro_sewingmachine_hon')->nullable()->comment('ジャンプマイクロミシン本');
            $table->tinyInteger('p_diecutter_jump_micro_sewingmachine_dai')->nullable()->comment('ジャンプマイクロミシン台');
            $table->char('p_diecutter_jump_micro_sewingmachine_ks', 1)->nullable()->comment('ジャンプマイクロミシン基・セ');
            $table->tinyInteger('p_diecutter_ana_hon')->nullable()->comment('穴本');
            $table->tinyInteger('p_diecutter_ana_dai')->nullable()->comment('穴台');
            $table->char('p_diecutter_ana_ks', 1)->nullable()->comment('穴基・セ');
            $table->tinyInteger('p_diecutter_cornercut')->nullable()->comment('コーナーカットヶ所');
            $table->tinyInteger('p_diecutter_cornercut_dai')->nullable()->comment('コーナーカット台');
            $table->char('p_diecutter_cornercut_ks', 1)->nullable()->comment('コーナーカット基・セ');
            $table->integer('p_diecutter_subtotal')->nullable()->comment('ダイカッタ工賃小計');
            $table->string('outsource_paper', 34)->nullable()->comment('紙の外注先');
            $table->integer('outsource_paper_cost')->nullable()->comment('外注費');
            $table->string('outsource_paper_all', 34)->nullable()->comment('このP全部の外注先');
            $table->integer('outsource_paper_all_cost')->nullable()->comment('外注費');
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
        Schema::dropIfExists('quotations_parts');
    }
}
