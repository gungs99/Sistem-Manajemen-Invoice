<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTransaksiLine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_transaksi_line', function (Blueprint $table) {
            $table->integer('jumlah');
            $table->integer('harga');
            $table->string('satuan',255)->nullable();
            $table->integer('grand_total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_transaksi_line', function (Blueprint $table) {
            //
        });
    }
}
