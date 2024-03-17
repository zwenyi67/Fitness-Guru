<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('total')->default(0);
            $table->integer('status')->default(1);
            $table->integer('method')->default(1);
            $table->string('image')->default('course.jpg');
            $table->text('description')->nullable();
            $table->integer('pending_status')->default(0);
            $table->decimal('price', 10 , 3)->nullable();
            $table->unsignedBigInteger('trainer_id')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->timestamps();
            $table->foreign('trainer_id')->references('id')->on('users')->nullable()->constrained()->cascadeOnDelete();
            $table->foreign('topic_id')->references('id')->on('course_topics')->nullable()->constrained()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
