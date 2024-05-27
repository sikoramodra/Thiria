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
        Schema::table('comment', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable()->after('added_at');
            $table->renameColumn('added_at', 'created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('comment', function (Blueprint $table) {
            $table->renameColumn('created_at', 'added_at');
            $table->dropColumn('updated_at');
        });
    }
};
