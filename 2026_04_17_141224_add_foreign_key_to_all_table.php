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
        //table dosen ke mahasiswa
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->char('nidn', 10)->after('npm');
            $table->foreign('nidn')
            ->references('nidn')
            ->on('dosen')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
        //table jadwal ke kodematakuliah dan ke dosen
        Schema::table('jadwal', function (Blueprint $table) {
            $table->char('kode_matakuliah', 8)->after('id');
            $table->char('nidn', 10)->after('kode_matakuliah');

             $table->foreign('kode_matakuliah')
            ->references('kode_matakuliah')
            ->on('matakuliah')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('nidn')
            ->references('nidn')
            ->on('dosen')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });

        //table jadwal ke kodematakuliah dan ke dosen
        Schema::table('krs', function (Blueprint $table) {
            $table->char('npm', 10)->after('id');
            $table->char('kode_matakuliah', 8)->after('npm');

             $table->foreign('npm')
            ->references('npm')
            ->on('mahasiswa')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('kode_matakuliah')
            ->references('kode_matakuliah')
            ->on('matakuliah')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });


   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('mahasiswa', function (Blueprint $table) {
        $table->dropForeign(['nidn']);
        $table->dropColumn('nidn');
    });

    Schema::table('jadwal', function (Blueprint $table) {
        $table->dropForeign(['kode_matakuliah']);
        $table->dropForeign(['nidn']);
        $table->dropColumn(['kode_matakuliah', 'nidn']);
    });

    Schema::table('krs', function (Blueprint $table) {
        $table->dropForeign(['npm']);
        $table->dropForeign(['kode_matakuliah']);
        $table->dropColumn(['npm', 'kode_matakuliah']);
    });
}
};
