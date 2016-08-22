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
            $table->boolean('banned')->default(false);  //������� ��
            $table->text('description');                //�������� ������� ����
            $table->time('Blacklist_off_time');         //����� �������
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
