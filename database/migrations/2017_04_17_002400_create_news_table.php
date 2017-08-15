<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cate_id');
            $table->string('name');
            $table->string('image')->default('none.png');
            $table->text('desc');
            $table->text('detail');
            $table->string('meta_key');
            $table->string('meta_desc');
            $table->integer('user_id');
            $table->boolean('isDraft')->default(0);
            $table->boolean('isBrowse')->default(0);
            $table->boolean('isPublish')->default(0);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('news');
    }
}
