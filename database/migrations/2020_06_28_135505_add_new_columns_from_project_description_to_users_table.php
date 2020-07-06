<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsFromProjectDescriptionToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname', 30)->default('');
            $table->string('avatar', 150)->default('');
            $table->string('gender', 10)->default('в смятении');
            $table->string('birth_date', 20)->default('это было давно');
            $table->string('country', 150)->default('Человек мира');
            $table->string('city', 150)->default('');
            $table->string('creed', 150)->default('Всегда!')->comment('Девиз по жизни');
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
            $table->dropColumn(['surname', 'avatar', 'country', 'city', 'creed','gender', 'birth_date']);
        });
    }
}
