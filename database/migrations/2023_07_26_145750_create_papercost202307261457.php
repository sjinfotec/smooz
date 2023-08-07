<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapercost202307261457 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papercosts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('code', 8)->comment('コード');
            $table->char('code_category', 1)->comment('区分 １：巻 ２：平');
            $table->char('code_paper_type', 3)->comment('用紙種類……　プリント順');
            $table->char('code_group_seq', 3)->comment('群内連番');
            $table->char('code_standard', 1)->comment('規格 平の場合は ０：四六，１：Ｂ２，２：Ａ判，３：菊判，４：ハトロン');
            $table->char('code_color', 2)->comment('色 平の場合のみ 　コード選択オート分野は上桁が常に【０】');
            $table->string('name')->nullable()->comment('用紙名');
            $table->string('standard')->nullable()->comment('規格（インチなど）　……　8.5,17.5,A判,菊判　……');
            $table->string('color')->nullable()->comment('色　……　Ｗ・Ｐ・Ｌ・Ｙ');
            $table->decimal('mater_unit_price',8,2)->nullable()->comment('メーター単価');
            $table->tinyInteger('pack_internal_number')->nullable()->comment('包内数（巻の場合ｍ数');
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
