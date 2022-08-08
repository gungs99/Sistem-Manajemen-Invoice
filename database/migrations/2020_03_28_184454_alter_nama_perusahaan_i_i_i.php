<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNamaPerusahaanIII extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nama_perusahaan', function (Blueprint $table) {
            $table->string('kontak', 255)->after('alamat');
            $table->string('email_pembayaran', 255)->after('kontak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nama_perusahaan', function (Blueprint $table) {
            //
        });
    }
}
