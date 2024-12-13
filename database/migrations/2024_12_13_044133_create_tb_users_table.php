<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->integer('user_id')->autoIncrement(); // INT(11)
            $table->string('user_email', 50)->unique(); // VARCHAR(50)
            $table->string('user_password', 100); // VARCHAR(100)
            $table->string('user_nama', 100); // VARCHAR(100)
            $table->text('user_alamat'); // TEXT
            $table->string('user_hp', 25); // VARCHAR(25)
            $table->string('user_pos', 5); // VARCHAR(5)
            $table->tinyInteger('user_role'); // TINYINT(2)
            $table->tinyInteger('user_aktif'); // TINYINT(2)
            $table->timestamp('created_at')->nullable(); // TIMESTAMP
            $table->dateTime('updated_at')->nullable(); // DATETIME
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tb_users');
    }
}