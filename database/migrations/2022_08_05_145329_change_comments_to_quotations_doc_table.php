<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCommentsToQuotationsDocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotations_doc', function (Blueprint $table) {
            $table->dropColumn('comment_2');
            $table->dropColumn('comment_3');
            $table->dropColumn('comment_4');
            $table->string('comment_1', 240)->change();

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
