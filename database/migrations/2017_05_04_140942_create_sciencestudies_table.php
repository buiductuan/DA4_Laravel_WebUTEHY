<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSciencestudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sciencestudy', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level')->default(0);
            $table->string('sciencestudy_id');
            $table->string('name');
            $table->text('desc');
            $table->text('detail');
            $table->string('author');
            $table->date('begin');
            $table->date('end');
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
        Schema::dropIfExists('sciencestudy');
    }
}
