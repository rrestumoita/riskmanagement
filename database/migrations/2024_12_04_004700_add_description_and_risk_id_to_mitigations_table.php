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
        Schema::table('mitigations', function (Blueprint $table) {
            $table->text('description')->nullable()->after('priority'); // Tambahkan kolom description
            $table->foreignId('risks_id')->nullable()->constrained('risks')->onDelete('cascade')->after('description'); // Tambahkan kolom risk_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mitigations', function (Blueprint $table) {
            $table->dropColumn('description'); // Hapus kolom description
            $table->dropForeign(['risks_id']); // Hapus foreign key risk_id
            $table->dropColumn('risks_id'); // Hapus kolom risk_id
        });
    }
};
