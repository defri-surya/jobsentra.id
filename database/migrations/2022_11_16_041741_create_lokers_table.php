<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('katagori_pekerjaan_id')->constrained('katagori_pekerjaan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('company_id')->constrained('perusahaans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode_loker')->nullable();
            $table->string('judul');
            $table->string('status_kerja');
            $table->string('pendidikan_min');
            $table->string('jurusan');
            $table->bigInteger('lokasi')->unsigned();
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->text('deskripsi');
            $table->string('skor');
            $table->string('status');
            $table->enum('status_company', ['Belum Verifikasi', 'Verifikasi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lokers');
    }
}
