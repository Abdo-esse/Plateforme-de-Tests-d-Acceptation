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
        Schema::create('test_presentiels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained(); // Relier à l'examinateur
            $table->foreignId('candidate_id')->constrained('users'); // Relier au candidat
            $table->timestamp('date_debu');
            $table->timestamp('date_fin');
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
        Schema::dropIfExists('test_presentiels');
    }
};
