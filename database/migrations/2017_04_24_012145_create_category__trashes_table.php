<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTrashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_trash', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('parentID')->default(0);
            $table->string('name');
            $table->string('alias');
            $table->integer('orderBy')->default(0);
            $table->string('image')->default('none.png');
            $table->text('desc');
            $table->string('meta_key');
            $table->string('meta_desc');
            $table->integer('user_id');
            $table->boolean('status')->default(1);
            $table->boolean('isShowNav')->deafault(0);
            $table->boolean('isShowContent')->deafault(0);
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
        Schema::dropIfExists('categories_trash');
    }
}
