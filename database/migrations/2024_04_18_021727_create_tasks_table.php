<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $currentTime = Carbon::now();
        $currentDate = Carbon::today();
        Carbon::create( $currentDate , $currentTime);

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('taskTitle');
            $table->string('taskType');
            $table->string('taskRemarks');
            $table->date('taskTimeStart');
            $table->date('taskTimeEnd');
            $table->string('taskDesignation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
