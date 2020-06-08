<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourseClassroomIdToCourseTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_teacher', function (Blueprint $table) {
            $table->unsignedBigInteger('course_classroom_id');
            $table->foreign('course_classroom_id')->references('id')->on('course_classroom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_teacher', function (Blueprint $table) {
            //
        });
    }
}
