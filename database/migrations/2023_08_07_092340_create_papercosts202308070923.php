<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapercosts202308070923 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papercosts', function (Blueprint $table) {
            $table->id();
            $table->char('code', 8)->comment('コード');
            $table->char('apply_date',8)->comment('適用日');
            $table->string('name')->nullable()->comment('用紙名');
            $table->string('name_display')->nullable()->comment('用紙名(表示用）');
            $table->string('standard')->nullable()->comment('規格（インチなど）　……　8.5,17.5,A判,菊判　……');
            $table->string('color')->nullable()->comment('色　……　Ｗ・Ｐ・Ｌ・Ｙ');
            $table->decimal('mater_unit_price',8,2)->nullable()->comment('メーター単価');
            $table->integer('pack_internal_number')->nullable()->comment('包内数（巻の場合ｍ数');
            $table->decimal('unit_price_1',6,1)->nullable()->comment('1枚単価 平の場合のみ');
            $table->decimal('unit_price_24',6,1)->nullable()->comment('24枚まで単価 平の場合のみ');
            $table->decimal('unit_price_49',6,1)->nullable()->comment('49枚まで単価 平の場合のみ');
            $table->decimal('unit_price_99',6,1)->nullable()->comment('99枚まで単価 平の場合のみ');
            $table->decimal('unit_price_124',6,1)->nullable()->comment('124枚まで単価 平の場合のみ');
            $table->decimal('unit_price_249',6,1)->nullable()->comment('249枚まで単価 平の場合のみ');
            $table->decimal('unit_price_499',6,1)->nullable()->comment('499枚まで単価 平の場合のみ');
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
        Schema::dropIfExists('papercosts');
    }
}
