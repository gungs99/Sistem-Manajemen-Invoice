<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_transaksi', function (Blueprint $table) {
            $table->string('id', 40);
            $table->string('customer', 115);
            $table->string('jasa', 115);
            $table->integer('jumlah');
            $table->integer('grand_total');
            $table->integer('ppn');
            $table->string('status_pengerjaan', 50);
            $table->string('status_pembayaran', 50);
            $table->timestamps();

            $table->primary('id');
            $table->foreign('customer')->references('id')->on('customer')->onDelete('restrict');
            $table->foreign('jasa')->references('id')->on('jasa')->onDelete('restrict');
            $table->foreign('status_pengerjaan')->references('id')->on('status_pengerjaan')->onDelete('restrict');
            $table->foreign('status_pembayaran')->references('id')->on('status_pembayaran')->onDelete('restrict');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_transaksi');
    }
}
