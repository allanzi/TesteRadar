<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $datas = [
            ['name' => 'Pendente'],
            ['name' => 'Em Desenvolvimento'],
            ['name' => 'Em Teste'],
            ['name' => 'Concluído']
        ];

        \DB::transaction(function () use ($datas) {
            foreach ($datas as $index => $data) {
                \DB::table('status')->insert($data);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');
    }
}
