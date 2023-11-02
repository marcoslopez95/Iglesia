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
        Schema::table('documents', function (Blueprint $table) {
            $table->string('ci_child')->nullable();
            $table->string('ci_mother')->nullable();
            $table->string('ci_father')->nullable();
            $table->string('ci_godparents_1')->nullable();
            $table->string('ci_godparents_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn([
                'ci_child',
                'ci_mother',
                'ci_father',
                'ci_godparents_1',
                'ci_godparents_2',
            ]);
        });
    }
};
