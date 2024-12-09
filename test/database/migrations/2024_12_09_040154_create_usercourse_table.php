<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateuserCourseTable extends Migration
{
    public function up(): void
    {
        Schema::create('usercourse', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usercourse');
    }
}
