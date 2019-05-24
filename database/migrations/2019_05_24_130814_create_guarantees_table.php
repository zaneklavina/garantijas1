<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuaranteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guarantees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number');
            $table->decimal('amount', 10,2);
            $table->integer('project_id')->unsigned();
            $table->integer('contract_id')->unsigned();
            $table->date('starts');
            $table->date('ends');
            $table->decimal('premija', 10,2);
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
        Schema::dropIfExists('guarantees');
    }
}
