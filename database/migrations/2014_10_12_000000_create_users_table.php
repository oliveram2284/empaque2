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
            $table->string('username')->unique();
            $table->string('full_name')->default('');
            $table->string('email')->default('');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('creado_por')->default(0);
            $table->integer('id_tipo')->default(0);
            $table->integer('id_sector')->default(0);
            $table->integer('id_puesto')->default(0);
            $table->integer('group_id')->default(0);
            $table->integer('catId')->default(0);
            $table->integer('grpId')->default(0);
            $table->integer('enable')->default(1);
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
