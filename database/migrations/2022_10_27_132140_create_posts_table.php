<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('content');
            $table->integer('category_id')->unsigned(); // Auto-increment always increases, so it will never use negative values. You might as well make it unsigned, and you get twice the range of values. On the other hand, if your table uses 231 values, it will probably also use 232 values in a short time, so having twice the range of values isn't a big difference. You will have to upgrade to BIGINT anyway.
            $table->integer('creator_id')->unsigned();
            $table->integer('views')->unsigned()->default(0); // unisgned - беззнаковое поле
            $table->string('thumbnail')->nullable(); // превью поста, необязательно
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
        Schema::dropIfExists('posts');
    }
};
