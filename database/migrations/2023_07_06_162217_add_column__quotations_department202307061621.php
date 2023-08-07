<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnQuotationsDepartment202307061621 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('quotations_department', function (Blueprint $table) {
            $table->char('donko2',1)->nullable()->after('press')->comment('ドンコ');
            $table->char('sheetcut',1)->nullable()->after('collator_basic_fee')->comment('シートカット');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
