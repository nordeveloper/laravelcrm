<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('amount')->nullable();
            $table->date('date_finish')->nullable();
            $table->string('comments')->nullable();
            $table->integer('contact_id')->nullable();
            $table->integer('stage_id');
            $table->integer('observer_id')->nullable();
            $table->integer('responsible_id')->nullable();
            $table->integer('created_by');
            $table->integer('modified_by');
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
        Schema::dropIfExists('deals');
    }
}
