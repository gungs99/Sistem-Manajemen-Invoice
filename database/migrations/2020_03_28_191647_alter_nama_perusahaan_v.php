<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNamaPerusahaanV extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nama_perusahaan', function (Blueprint $table) {
            $table->string('nama_web', 255)->after('alamat');
            $table->string('nama_cabang', 255)->after('email_pembayaran');
            $table->integer('no_npwp', 20)->after('nama_direktur');
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
