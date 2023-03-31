<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     private $table_name = 'transactions';

    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('type')->nullable(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table_name, function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists($this->table_name);
    }
};
