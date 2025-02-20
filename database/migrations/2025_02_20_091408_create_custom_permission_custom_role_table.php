<?php
// database/migrations/xxxx_xx_xx_create_custom_permission_custom_role_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('custom_permission_custom_role', function (Blueprint $table) {
            $table->unsignedBigInteger('custom_role_id');
            $table->unsignedBigInteger('custom_permission_id');
            $table->foreign('custom_role_id')->references('id')->on('custom_roles')->onDelete('cascade');
            $table->foreign('custom_permission_id')->references('id')->on('custom_permissions')->onDelete('cascade');
            $table->primary(['custom_role_id', 'custom_permission_id']);
        });
    }

    public function down() {
        Schema::dropIfExists('custom_permission_custom_role');
    }
};

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('custom_permission_custom_role', function (Blueprint $table) {
//             $table->id();
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('custom_permission_custom_role');
//     }
// };
