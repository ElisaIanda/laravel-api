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
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign("projects_type_id_foreign");
            $table->foreign('type_id')                                                                //creazione FOREIGN KEY
                    ->references('id')                                                                    //che fa riferimento alla colonna ID
                    ->on('types')                                                                        //nella tabella USERS
                    ->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
};
