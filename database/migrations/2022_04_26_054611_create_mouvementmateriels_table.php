<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mouvementmateriels', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->string('motif');
            $table->foreignId('materiel_id')->constrained()->onDelete('cascade');
            $table->foreignId('typemouvementmateriel_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mouvementmateriels');
    }
};
