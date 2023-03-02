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
        Schema::create('users', function (Blueprint $table) {
            // foreign key columns must be of the same type, therefore you need to either change the foreing key (in this example it's user_id) to bigInteger in role_user table or change bigIncrements method to increments method in users table and use the commented line in the pivot table, it's up to you.
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            //online status
            $table->timestamp('last_seen')->nullable();
            $table->string('description')->nullable();
            $table->date('birth_date')->nullable();

            $table->string('password');
            $table->string('avatar')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
