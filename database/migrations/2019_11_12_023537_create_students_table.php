<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('students')) {
            Schema::create('students', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('class_id')->nullable($value = false)->index();
                $table->char('student_code', 10)->nullable($value = false);
                $table->string('first_name', 100)->nullable($value = false);
                $table->string('last_name', 100)->nullable($value = false);
                $table->char('email',255)->unique();
                $table->date('birthday')->nullable($value = true);
                $table->char('gender', 10);
                $table->char('telephone', 127)->nullable($value = true);
                $table->binary('photo');
                $table->multiLineString('address');
                $table->boolean('is_active')->nullable($value = false)->default(true);
                $table->timestamps();
                $table->foreign('class_id')->references('id')->on('classes');
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
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('students_class_id_foreign');
        });
        Schema::dropIfExists('students');
    }
}
