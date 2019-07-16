<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocsAdministratif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs_administratifs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->string('etat');
            $table->date('date_recue')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::table('docs_administratifs', function (Blueprint $table) {
            Schema::dropIfExists('docs_administratifs');
            $table->dropColumn('user_id');
            $table->dropForeign(['user_id']);
        });
    }
}
