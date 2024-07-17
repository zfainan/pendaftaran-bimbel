<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('tempat_lahir')->nullable()->change();
            $table->string('tgl_lahir')->nullable()->change();
            $table->enum('gender', ['L', 'P'])->nullable()->change();
            $table->integer('kelas')->nullable()->change();
            $table->string('asal_sekolah')->nullable()->change();
            $table->string('no_telp')->nullable()->change();
            $table->string('nama_ortu')->nullable()->change();
            $table->string('pekerjaan_ortu')->nullable()->change();
            $table->string('no_telp_ortu')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
