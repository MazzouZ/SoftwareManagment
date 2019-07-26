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
        Schema::table('users', function (Blueprint $table) {
            $table->string('cin'             )->nullable();
            $table->string('cnss'            )->nullable();
            $table->string('polite'          )->nullable();
            $table->string('adress'          )->nullable();
            $table->date  ('exit_date'       )->nullable();
            $table->date  ('hiring_date'     )->nullable();
            $table->date  ('birth_date'      )->nullable();
           $table->integer('order_number'    )->nullable();
            $table->string('professions'     )->nullable();
            $table->float( 'net_salary'      )->nullable();
            $table->float( 'gross_salary'    )->nullable();
            $table->string('family_situation')->nullable();
           $table->integer('nbr_children'    )->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('cin'             );
            $table->dropColumn('cnss'            );
            $table->dropColumn('polite'          );
            $table->dropColumn('adress'          );
            $table->dropColumn('exit_date'       );
            $table->dropColumn('hiring_date'     );
            $table->dropColumn('birth_date'      );
            $table->dropColumn('order_number'    );
            $table->dropColumn('professions'     );
            $table->dropColumn('net_salary'      );
            $table->dropColumn('gross_salary'    );
            $table->dropColumn('family_situation');
            $table->dropColumn('nbr_children'    );


        });
    }
}
