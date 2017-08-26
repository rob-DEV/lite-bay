<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password');

            //email verification
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();

            //each user gets their own ltc wallet
            $table->string('app_public_ltc_address')->default("");;
            $table->string('app_private_ltc_address')->default("");;

            //a stored public key for the guest personal wallet (vessel to withdraw ltc from lite-bay)
            $table->string('user_ltc_address')->nullable();

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
}
