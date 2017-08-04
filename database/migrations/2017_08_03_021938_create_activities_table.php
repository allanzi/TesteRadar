<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description');
            $table->date('start_date');
            $table->date('finish_date')->nullable();

            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status');

            $table->enum('situation', ['Ativo', 'Inativo']);

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
        Schema::table('activities', function (Blueprint $table) {
            $table->dropForeign('activities_status_id_foreign');
        });
        Schema::dropIfExists('activities');
    }
}
