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
    /*public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }*/
	
	public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique(); // was 'email'
            $table->string('password');
            $table->string('name'); // to be read from LDAP
            $table->bigInteger('cpf')->nullable(); // extra field to read from LDAP
            $table->integer('matricula')->nullable(); // extra field to read from LDAP
            $table->string('email')->nullable(); // extra field to read from LDAP
            $table->string('lotacao')->nullable(); // extra field to read from LDAP
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
