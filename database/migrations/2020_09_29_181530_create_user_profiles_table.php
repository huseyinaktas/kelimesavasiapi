<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string("image");
            $table->foreignId("user_id");
            $table->integer("level")->default(1);
            $table->string("about")->nullable();
            $table->integer("total_game")->default(0);
            $table->integer("total_win")->default(0);
            $table->integer("total_draw")->default(0);
            $table->integer("score")->default(0);
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
        Schema::dropIfExists('user_profiles');
    }
}
