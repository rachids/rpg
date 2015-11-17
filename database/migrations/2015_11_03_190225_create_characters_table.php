<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->enum('gender', ['male', 'female']);

            $table->unsignedInteger('xp');
            $table->unsignedInteger('level');

            $table->integer('money');

            // attributes
            $table->integer('strength');
            $table->integer('agility');
            $table->integer('constitution');
            $table->integer('intelligence');
            $table->integer('charisma');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unsignedInteger('race_id');
            $table->foreign('race_id')
                ->references('id')
                ->on('races')
                ->onDelete('cascade');

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
        Schema::drop('characters');
    }
}
