<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborators', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 100);
            $table->string('username', 50)->unique();
            $table->string('email', 100)->unique()->nullable();
            $table->string('position_held', 100)->nullable();
            $table->string('picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collaborators');
    }
}
