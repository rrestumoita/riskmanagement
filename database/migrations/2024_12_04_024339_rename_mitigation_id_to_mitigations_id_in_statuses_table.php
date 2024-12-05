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
            // Mengubah nama kolom dari mitigation_id menjadi mitigations_id
            $table->renameColumn('mitigation_id', 'mitigations_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('statuses', function (Blueprint $table) {
            // Mengembalikan nama kolom menjadi mitigation_id
            $table->renameColumn('mitigations_id', 'mitigation_id');
        });
    }
};
