<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('description')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('number')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('prospace')->nullable();
            $table->string('instagram')->nullable();
            $table->string('website')->nullable();
            $table->string('status')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('tags')->nullable();
            $table->longText('languages')->nullable();
            $table->string('keywords')->nullable();
            $table->string('area_focused')->nullable();
            $table->string('type')->nullable()->default('admin');
            $table->string('meta_description')->nullable();
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
