<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('active_chats', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->comment('id пользователя');
            $table->unsignedBigInteger('chat_id')->comment('id чата');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('chat_id')->references('id')->on('users');
            $table->unique(['user_id', 'chat_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('active_chats', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'chat_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['chat_id']);
        });
        Schema::dropIfExists('chats_activities');
    }
}
