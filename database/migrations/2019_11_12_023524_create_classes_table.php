<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('classes')) {
            Schema::create('classes', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('grade_id')->nullable($value = false)->index();
                $table->string('name')->nullable($value = false);
                $table->timestamps();
                $table->foreign('grade_id')->references('id')->on('grades');
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
        Schema::table('classes', function (Blueprint $table) {
            $table->dropForeign('classes_grade_id_foreign');
        });
        Schema::dropIfExists('classes');
    }
}
