<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewTrashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_trashes', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('cate_id');
            $table->string('name');
            $table->string('image')->default('none.png');
            $table->text('desc')->nullable();
            $table->text('detail')->nullable();
            $table->string('meta_key')->nullable();
            $table->string('meta_desc')->nullable();
            $table->integer('user_id');
            $table->boolean('isDraft')->default(0);
            $table->boolean('isBrowse')->default(0);
            $table->boolean('isPublish')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_trashes');
    }
}
