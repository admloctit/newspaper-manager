<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('student_subjects')) {
            Schema::create('student_subjects', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('student_id')->nullable($value = false)->index();
                $table->unsignedBigInteger('subject_id')->nullable($value = false)->index();
                $table->timestamps();
                $table->foreign('student_id')->references('id')->on('students');
                $table->foreign('subject_id')->references('id')->on('subjects');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_subjects', function (Blueprint $table) {
            $table->dropForeign('student_subjects_student_id_foreign');
            $table->dropForeign('student_subjects_subject_id_foreign');
        });

        Schema::dropIfExists('student_subjects');
    }
}
