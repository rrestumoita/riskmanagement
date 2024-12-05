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
        Schema::table('statuses', function (Blueprint $table) {
            $table->unsignedBigInteger('mitigations_id')->after('id'); // Menambahkan kolom mitigation_id
            $table->foreign('mitigations_id')
                  ->references('id')
                  ->on('mitigations')
                  ->onDelete('cascade'); // Relasi dengan mitigations
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('statuses', function (Blueprint $table) {
            $table->dropForeign(['mitigations_id']); // Hapus foreign key
            $table->dropColumn('mitigations_id');    // Hapus kolom mitigation_id
        });
    }
};
