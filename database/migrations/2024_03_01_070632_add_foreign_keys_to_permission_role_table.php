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
        Schema::table('permission_role', function (Blueprint $table) {
            $table->foreign('permission_id', 'fk_permission_role_to_permission')
            ->references('id')->on('permission')->onDelete('CASCADE')
            ->onUpdate('CASCADE');
            $table->foreign('role_id', 'fk_permission_role_to_role')
            ->references('id')->on('role')->onDelete('CASCADE')
            ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropforeign('fk_permission_role_to_permission');
            $table->dropforeign('fk_permission_role_to_role');
        });
    }
};
