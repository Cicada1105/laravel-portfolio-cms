<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('institution_name');
            $table->enum('degree_type',['Undergraduate','Masters','Post Graduate Certificate','Doctorate']);
            $table->string('degree');
            $table->enum('start_month',['january','february','march','april','may','june','july','august','september','october','november','december']);
            $table->year('start_year');
            $table->enum('end_month',['january','february','march','april','may','june','july','august','september','october','november','december']);
            $table->year('end_year');
            $table->string('slug')->unique();
            $table->foreignId('user_id');
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
        Schema::dropIfExists('education');
    }
}
