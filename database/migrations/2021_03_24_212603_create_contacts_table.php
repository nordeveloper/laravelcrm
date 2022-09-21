<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id')->nullable();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->integer('responsible_id')->nullable();
            $table->integer('source_id')->nullable();
            $table->integer('created_by');
            $table->integer('modified_by')->nullable();
            $table->string('photo')->nullable();
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
