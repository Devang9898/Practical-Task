<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // New Roles Table
        Schema::create('new_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // New Permissions Table
        Schema::create('new_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Pivot Table: Role-Permission
        Schema::create('role_permission', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('new_roles')->onDelete('cascade');
            $table->foreignId('permission_id')->constrained('new_permissions')->onDelete('cascade');
        });

        // Pivot Table: User-Role
        Schema::create('user_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('role_id')->constrained('new_roles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_role');
        Schema::dropIfExists('role_permission');
        Schema::dropIfExists('new_permissions');
        Schema::dropIfExists('new_roles');
    }
};
