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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_type_id')
                ->constrained()
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->string('child')->nullable();
            $table->string('mother')->nullable()->comment('only for bautismo, or for matricidio');
            $table->string('father')->nullable()->comment('only for bautismo, or for matricidio');
            $table->string('place_birth')->nullable()->comment('only for bautismo');
            $table->date('birth')->nullable()->comment('only for bautismo, o fecha de maatricidio');
            $table->date('date')->nullable()->comment('fecha de bautismo o de confirmacion');
            $table->string('godparents_1')->nullable();
            $table->string('godparents_2')->nullable();
            $table->string('by_priets')->nullable();
            $table->string('ending')->nullable();
            //------------------
            $table->string('num_libro')->nullable();
            $table->string('num_folio')->nullable();
            $table->string('num')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
