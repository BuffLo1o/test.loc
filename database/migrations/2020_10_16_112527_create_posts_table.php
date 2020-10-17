<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //TODO если есть автор, то где его таблица?
            $table->integer('author_id');
            $table->string('subject');
            //TODO дата чего?
            $table->DateTime('date');
            //TODO тебе точно нужна возможность чтоб like был отрицательным числом? есть специальный тип unsigned integer
            $table->integer('like');
            //TODO string вместит в себе максимум 255 символов, этого точно хватит?
            $table->string('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
