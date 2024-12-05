<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameRiskIdToRisksIdInMitigationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mitigations', function (Blueprint $table) {
            $table->renameColumn('risk_id', 'risks_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mitigations', function (Blueprint $table) {
            $table->renameColumn('risks_id', 'risk_id');
        });
    }
};
