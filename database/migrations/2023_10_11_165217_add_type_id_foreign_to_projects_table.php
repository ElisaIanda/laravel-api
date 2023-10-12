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
                $table->unsignedBigInteger('type_id')->nullable();                                        //creazione di una colonna "unsignedBigInteger. Nullable altrimenti da errore
                $table->foreign('type_id')                                                                //creazione FOREIGN KEY
                    ->references('id')                                                                    //che fa riferimento alla colonna ID
                    ->on('projects')                                                                        //nella tabella USERS
                    ->onDelete('cascade');                                                                //se lo USER viene cancellato, i suoi POST verrato anch'essi cancellati. Opzionale
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('type_id');
            $table->dropColumn('type_id');
        });
    }
};
