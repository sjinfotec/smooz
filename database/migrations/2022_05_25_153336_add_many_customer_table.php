<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddManyCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer', function (Blueprint $table) {

            $table->integer('code')->nullable()->comment('得意先コード');
            $table->String('classify',5)->comment('区分');
            $table->String('name',60)->comment('得意先名／外注先名');
            $table->String('post',8)->nullable()->comment('郵便番号');
            $table->String('address1',100)->nullable()->comment('住所1');
            $table->String('address2',100)->nullable()->comment('住所2');
            $table->String('tel',14)->nullable()->comment('TEL');
            $table->String('fax',12)->nullable()->comment('FAX');
            $table->String('charge',10)->nullable()->comment('担当');
            $table->String('cutoff',5)->nullable()->comment('締め日');
            $table->String('collection',5)->nullable()->comment('回収日');
            $table->String('tax_class',5)->nullable()->comment('税区分');
            $table->String('tax_fraction',5)->nullable()->comment('税端数処理');
            $table->String('industry',10)->nullable()->comment('業種');
            $table->String('created_user',10)->nullable()->comment('作成ユーザー');
            $table->String('updated_user',10)->nullable()->comment('修正ユーザー');
            $table->dateTime('created_at')->nullable()->comment('作成時間');
            $table->dateTime('updated_at')->nullable()->comment('修正時間');
            $table->boolean('is_deleted')->default(0)->comment('削除フラグ');

        });
    }

        /*
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('修正時間');

        */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('classify');
            $table->dropColumn('name');
            $table->dropColumn('post');
            $table->dropColumn('address1');
            $table->dropColumn('address2');
            $table->dropColumn('tel');
            $table->dropColumn('fax');
            $table->dropColumn('charge');
            $table->dropColumn('cutoff');
            $table->dropColumn('collection');
            $table->dropColumn('tax_class');
            $table->dropColumn('tax_fraction');
            $table->dropColumn('industry');
            $table->dropColumn('created_user');
            $table->dropColumn('updated_user');
            $table->dropColumn('is_deleted');
        });
    }
}
