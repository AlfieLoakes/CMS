<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtemplates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('site_id');
            $table->string('name');
            $table->text('head')->nullable();
            $table->text('body')->nullable();
            $table->text('css')->nullable();
            $table->timestamps();
            $table->tinyInteger('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subtemplates');
    }
}
