<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function(blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')
                ->references('id')          //связать с id
                ->on('users')               //таблицы users
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')          //связать с id
                ->on('roles')               //таблицы roles
                ->onDelete('cascade');

            $table->primary(['role_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
