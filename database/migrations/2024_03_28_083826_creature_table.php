<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('creature', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('user');
            $table->string('name');
            $table->text('description');
            $table->jsonb('statblock')->nullable();
            $table->timestamp('added_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('creature');
    }
};
