<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('chats_activities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->comment('id пользователя');
            $table->unsignedBigInteger('chat_id')->comment('id чата');
            $table->timestamp('active_from')->comment('Чат активен с даты');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('chat_id')->references('id')->on('users');
            $table->index(['user_id', 'chat_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('chats_activities', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'chat_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['chat_id']);
        });
        Schema::dropIfExists('chats_activities');
    }
}
