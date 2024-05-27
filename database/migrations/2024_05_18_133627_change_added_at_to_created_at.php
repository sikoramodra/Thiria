<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('creature', function (Blueprint $table) {
            $table->renameColumn('added_at', 'created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('creature', function (Blueprint $table) {
            $table->renameColumn('created_at', 'added_at');
        });
    }
};
