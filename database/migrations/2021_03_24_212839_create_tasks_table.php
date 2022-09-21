<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('status_id')->nullable();
            $table->string('title');
            $table->string('description')->nullable();            
            $table->datetime('start_date')->nullable();
            $table->datetime('finish_date')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('responsible_id')->nullable();
            $table->integer('created_by');
            $table->integer('modified_by')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
