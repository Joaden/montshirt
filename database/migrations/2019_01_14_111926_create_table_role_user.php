<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRoleUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
             $table->timestamps();

             $table->unsignedInteger('role_id');
             $table->foreign('role_id')
                 ->references('id')->on('roles')->onDelete('cascade');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->primary(['role_id','user_id']);
            Schema::enableForeignKeyConstraints();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
