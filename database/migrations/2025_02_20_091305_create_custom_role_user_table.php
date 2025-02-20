<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('custom_role_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('custom_role_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('custom_role_id')->references('id')->on('custom_roles')->onDelete('cascade');
            $table->primary(['user_id', 'custom_role_id']);
        });
    }

    public function down() {
        Schema::dropIfExists('custom_role_user');
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
//         Schema::create('custom_role_user', function (Blueprint $table) {
//             $table->id();
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('custom_role_user');
//     }
// };
