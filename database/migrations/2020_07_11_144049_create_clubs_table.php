<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('avatar', 150)->nullable(true)->default('');
            $table->date('birth_date')->nullable(true);
            $table->string('country', 150);
            $table->string('city', 150);
            $table->string('creed', 150)->nullable(true)->default('Всегда!')->comment('Девиз по жизни');
            $table->text('description')->nullable(true)->comment('Описание');
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
        Schema::dropIfExists('Clubs');
    }
}
