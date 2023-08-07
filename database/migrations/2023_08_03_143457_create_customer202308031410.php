<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomer202308031410 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->char('code',5)->comment('得意先コード');
            $table->char('apply_date',8)->comment('適用日');
            $table->char('category',1)->comment('区分');
            $table->String('name',60)->comment('得意先名／外注先名');
            $table->String('post',8)->nullable()->comment('郵便番号');
            $table->String('address1',100)->nullable()->comment('住所1');
            $table->String('address2',100)->nullable()->comment('住所2');
            $table->String('tel',14)->nullable()->comment('TEL');
            $table->String('fax',12)->nullable()->comment('FAX');
            $table->char('charge',10)->nullable()->comment('担当');
            $table->char('cutoff',2)->nullable()->comment('締め日');
            $table->char('collection',2)->nullable()->comment('回収日');
            $table->char('tax_class',1)->nullable()->comment('税区分');
            $table->char('tax_fraction',1)->nullable()->comment('税端数処理');
            $table->char('industry',2)->nullable()->comment('業種');
            $table->char('created_date',10)->nullable()->comment('作成日');
            $table->char('created_time',5)->nullable()->comment('作成時刻');
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
        Schema::dropIfExists('customers');
    }
}
