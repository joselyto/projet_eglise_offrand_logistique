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
        Schema::create('mouvementoffrandes', function (Blueprint $table) {
            $table->id();
            $table->float('montant');
            $table->integer('monnaie');
            $table->text('motif');
            $table->integer('type_offrande');
            $table->date('date_concerner');
            $table->foreignId('typemouvementoffrande_id')->constrained()->onDelete('cascade');           
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
        Schema::dropIfExists('mouvementoffrandes');
    }
};
