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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('election_id')->constrained('elections')->cascadeOnDelete();
            $table->foreignId('leader_id')->constrained('users');
            $table->unsignedBigInteger('coleader_id')->nullable();
            $table->integer('number')->nullable();
            $table->string('lead_position');
            $table->string('colead_position')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->string('slogan')->nullable();
            $table->string('candidate_image')->nullable();

            $table->foreign('coleader_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
