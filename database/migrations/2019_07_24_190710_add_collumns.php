<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entreprises', function (Blueprint $table) {

         $table->string('adresse')->nullable();
         $table->string('zip_code')->nullable();
         $table->string('rc')->nullable();
         $table->string('patente')->nullable();
         $table->string('idfisc')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entreprises', function (Blueprint $table) {
            $table->dropColumn('adresse');
            $table->dropColumn('zip_code');
            $table->dropColumn('rc');
            $table->dropColumn('patente');
            $table->dropColumn('idfisc');
        });
    }
}
