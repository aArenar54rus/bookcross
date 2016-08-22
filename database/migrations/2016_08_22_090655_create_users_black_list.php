<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersBlackList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_black_list', function(blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->boolean('banned')->default(false);  //забанен ли
            $table->text('description');                //описание причины бана
            $table->time('Blacklist_off_time');         //время разбана
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
        Schema::drop('advert');
    }
}
