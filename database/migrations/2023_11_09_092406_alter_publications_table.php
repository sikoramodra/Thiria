<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table(
            'publication', function (Blueprint $table) {
                $table->dropColumn('author');

                $table->foreignId('author_id')
                      ->after('content')
                      ->references('id')
                      ->on('user');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table(
            'publication', function (Blueprint $table) {
                $table->dropForeign(['author_id']);
                $table->dropColumn('author_id');

                $table->string('author')->after('content');
            }
        );
    }
};
