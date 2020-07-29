<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20)->nullable(true)->default('');
            $table->string('brand', 40)->nullable(true)->default('');
            $table->string('model', 40)->nullable(true)->default('');
            $table->year('vehicle_bd')->nullable(true);
            $table->text('description')->nullable(true);
            $table->string('avatar', 150)->nullable(true)->default('');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_vehicles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('user_vehicles');
    }
}
