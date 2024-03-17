<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('gender')->nullable();
            $table->decimal('height', 5, 2)->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->string('image')->default('user.jpg');
            $table->string('phone')->nullable();
            $table->string('township')->nullable();
            $table->string('address')->nullable();

            $table->integer('age')->nullable();

            $table->decimal('experience', 3 , 1)->nullable();
            $table->foreignId('sport_id')->nullable()->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->decimal('hourly_rate', 8 , 3)->nullable();
            $table->string('current_gym')->nullable();
            $table->json('body_image')->nullable();
            $table->json('certification')->nullable();
            $table->text('description')->nullable();

            $table->string('cv_form')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();

            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            
            $table->integer('status')->default(0);
            $table->integer('pending_status')->default(0);
            $table->integer('available_status')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
