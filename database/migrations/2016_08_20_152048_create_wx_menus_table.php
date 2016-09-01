<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('parent_id');
            $table->string('name');
            $table->smallInteger('type');
            $table->text('content');
            $table->smallInteger('order_id');
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
        Schema::drop('wx_menus');
    }
}
