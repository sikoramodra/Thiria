<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('creature', function (Blueprint $table) {
            $table->softDeletes();
            $table->fullText(['name', 'description']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('creature', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropFullText('creature_name_description_fulltext');
        });
    }
};
