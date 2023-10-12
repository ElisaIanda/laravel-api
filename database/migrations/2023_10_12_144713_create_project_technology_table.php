<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_technology', function (Blueprint $table) {
            $table->id();
            // Aggiungo la foreign key del project
            $table->unsignedBigInteger('project_id');

            $table->foreign("project_id")
                ->references("id")
                ->on("projects");
            
            // Aggiungo la foreign key del technology
            $table->unsignedBigInteger('technology_id');

            $table->foreign("technology_id")
                ->references("id")
                ->on("technologies");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
