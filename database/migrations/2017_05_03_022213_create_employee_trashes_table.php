<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTrashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_trash', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('facultyID');
            $table->integer('subjectID');
            $table->string('name');
            $table->string('fullname');
            $table->string('image')->default('none.png');
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('mobilephone')->nullable();
            $table->string('homephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('department')->nullable();
            $table->string('education')->nullable();
            $table->string('office')->nullable();
            $table->string('website')->nullable();

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
        Schema::dropIfExists('employee_trash');
    }
}
