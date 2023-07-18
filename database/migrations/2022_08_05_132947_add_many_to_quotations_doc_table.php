<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddManyToQuotationsDocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotations_doc', function (Blueprint $table) {
            $table->tinyInteger('lines')->nullable()->after('format_mode')->comment('行数');
            $table->integer('estimate_amount_10')->nullable()->comment('金額10')->after('tax');
            $table->integer('production_volnum_10')->nullable()->comment('数量10')->after('tax');
            $table->char('production_volnum_unit_10', 1)->nullable()->comment('形態10')->after('tax');
            $table->string('product_10', 50)->nullable()->comment('製品名10')->after('tax');
            $table->char('m_code_10', 10)->nullable()->comment('見積番号10')->after('tax');
            $table->integer('estimate_amount_9')->nullable()->comment('金額9')->after('tax');
            $table->integer('production_volnum_9')->nullable()->comment('数量9')->after('tax');
            $table->char('production_volnum_unit_9', 1)->nullable()->comment('形態9')->after('tax');
            $table->string('product_9', 50)->nullable()->comment('製品名9')->after('tax');
            $table->char('m_code_9', 10)->nullable()->comment('見積番号9')->after('tax');
            $table->integer('estimate_amount_8')->nullable()->comment('金額8')->after('tax');
            $table->integer('production_volnum_8')->nullable()->comment('数量8')->after('tax');
            $table->char('production_volnum_unit_8', 1)->nullable()->comment('形態8')->after('tax');
            $table->string('product_8', 50)->nullable()->comment('製品名8')->after('tax');
            $table->char('m_code_8', 10)->nullable()->comment('見積番号8')->after('tax');
            $table->integer('estimate_amount_7')->nullable()->comment('金額7')->after('tax');
            $table->integer('production_volnum_7')->nullable()->comment('数量7')->after('tax');
            $table->char('production_volnum_unit_7', 1)->nullable()->comment('形態7')->after('tax');
            $table->string('product_7', 50)->nullable()->comment('製品名7')->after('tax');
            $table->char('m_code_7', 10)->nullable()->comment('見積番号7')->after('tax');
            $table->integer('estimate_amount_6')->nullable()->comment('金額6')->after('tax');
            $table->integer('production_volnum_6')->nullable()->comment('数量6')->after('tax');
            $table->char('production_volnum_unit_6', 1)->nullable()->comment('形態6')->after('tax');
            $table->string('product_6', 50)->nullable()->comment('製品名6')->after('tax');
            $table->char('m_code_6', 10)->nullable()->comment('見積番号6')->after('tax');
            $table->integer('estimate_amount_5')->nullable()->comment('金額5')->after('tax');
            $table->integer('production_volnum_5')->nullable()->comment('数量5')->after('tax');
            $table->char('production_volnum_unit_5', 1)->nullable()->comment('形態5')->after('tax');
            $table->string('product_5', 50)->nullable()->comment('製品名5')->after('tax');
            $table->char('m_code_5', 10)->nullable()->comment('見積番号5')->after('tax');
            $table->integer('estimate_amount_4')->nullable()->comment('金額4')->after('tax');
            $table->integer('production_volnum_4')->nullable()->comment('数量4')->after('tax');
            $table->char('production_volnum_unit_4', 1)->nullable()->comment('形態4')->after('tax');
            $table->string('product_4', 50)->nullable()->comment('製品名4')->after('tax');
            $table->char('m_code_4', 10)->nullable()->comment('見積番号4')->after('tax');
            $table->integer('estimate_amount_3')->nullable()->comment('金額3')->after('tax');
            $table->integer('production_volnum_3')->nullable()->comment('数量3')->after('tax');
            $table->char('production_volnum_unit_3', 1)->nullable()->comment('形態3')->after('tax');
            $table->string('product_3', 50)->nullable()->comment('製品名3')->after('tax');
            $table->char('m_code_3', 10)->nullable()->comment('見積番号3')->after('tax');
            $table->integer('estimate_amount_2')->nullable()->comment('金額2')->after('tax');
            $table->integer('production_volnum_2')->nullable()->comment('数量2')->after('tax');
            $table->char('production_volnum_unit_2', 1)->nullable()->comment('形態2')->after('tax');
            $table->string('product_2', 50)->nullable()->comment('製品名2')->after('tax');
            $table->char('m_code_2', 10)->nullable()->comment('見積番号2')->after('tax');
            $table->integer('estimate_amount_1')->nullable()->comment('金額1')->after('tax');
            $table->integer('production_volnum_1')->nullable()->comment('数量1')->after('tax');
            $table->char('production_volnum_unit_1', 1)->nullable()->comment('形態1')->after('tax');
            $table->string('product_1', 50)->nullable()->comment('製品名1')->after('tax');
            $table->char('m_code_1', 10)->nullable()->comment('見積番号1')->after('tax');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotations_doc', function (Blueprint $table) {
            //
        });
    }
}
