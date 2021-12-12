<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->unsignedInteger('project_location_id')->constrained('project_locations');
            $table->string('desc_category');
            $table->date('date_raised');
            $table->text('event');
            $table->enum('lesson_category', ['positive', 'negative']);
            $table->string('warning_signs');
            $table->text('recommendations');
            $table->string('action');
            $table->string('owner');
            $table->text('comments')->nullable();
            $table->string('risk_level')->nullable();
            $table->string('images')->nullable();
            $table->string('attachment')->nullable();
            $table->string('wbs_id')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('lessons');
    }
}
