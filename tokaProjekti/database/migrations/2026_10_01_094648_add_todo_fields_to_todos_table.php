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
        Schema::table('todos', function (Blueprint $table) {
            //
            $table->text('kuvaus')->nullable();
            $table->string('status')->nullable();
            $table->date('määräpäivä')->nullable();
            $table->string('kiireellisyys')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todos', function (Blueprint $table) {
            //
            $table->dropColumn([
                'kuvaus',
                'status',
                'määräpäivä',
                'kiireellisyys',
            ]);
        });
    }
};
