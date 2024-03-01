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
        Schema::table('detail_user', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_detail_user_to_users')
            ->references('id')->on('users')->onDelete('CASCADE')
            ->onUpdate('CASCADE');
            $table->foreign('type_user_id', 'fk_detail_user_to_type_user')
            ->references('id')->on('type_user')->onDelete('CASCADE')
            ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_user', function (Blueprint $table) {
            $table->dropforeign('fk_detail_user_to_users');
            $table->dropforeign('fk_detail_user_to_type_user');
        });
    }
};
