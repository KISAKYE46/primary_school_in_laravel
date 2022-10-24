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
    public function up()
    {
        Schema::create('grading', function (Blueprint $table) {
            $table->unsignedBigInteger("grading_id")->autoIncrement();
            $table->double("from_mark");
            $table->double("to_mark");
            $table->unsignedBigInteger("level")->default(1);
            $table->string("reward");
            $table->string("points");
            $table->timestamp("grading_create_date")->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};