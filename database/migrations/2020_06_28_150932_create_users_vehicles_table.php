<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20)->default('');
            $table->string('brand', 40)->default('');
            $table->string('model', 40)->default('');
            $table->year('vehicle_bd')->nullable(true);
            $table->text('description')->nullable(true);
            $table->string('avatar', 150)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_vehicles');
    }
}
