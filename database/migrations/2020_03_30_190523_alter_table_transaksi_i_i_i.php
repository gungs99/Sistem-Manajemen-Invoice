<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTransaksiIII extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('table_transaksi', 'material'))
        {
        Schema::table('table_transaksi', function (Blueprint $table) {
            $table->string('material', 115)->after('jasa');            
        });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('table_transaksi', 'harga_material'))
        {
        Schema::table('table_transaksi', function (Blueprint $table) {
            $table->dropColumn('harga_material');
        });
    }
}

}