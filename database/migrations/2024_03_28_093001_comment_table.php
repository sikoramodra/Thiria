<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comment_id')->nullable()->references('id')
                  ->on('comment')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')
                  ->on('user')->onDelete('cascade');
            $table->foreignId('creature_id')->references('id')
                  ->on('creature')->onDelete('cascade');
            $table->text('text');
            $table->timestamp('added_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('comment');
    }
};
