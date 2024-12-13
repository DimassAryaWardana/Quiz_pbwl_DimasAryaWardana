<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tb_golongan', function (Blueprint $table) {
            $table->tinyInteger('gol_id')->autoIncrement(); // TINYINT(3)
            $table->string('gol_kode', 10); // VARCHAR(10)
            $table->string('gol_nama', 50); // VARCHAR(50)
            $table->timestamp('created_at')->nullable(); // TIMESTAMP
            $table->dateTime('updated_at')->nullable(); // DATETIME
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tb_golongan');
    }
};
