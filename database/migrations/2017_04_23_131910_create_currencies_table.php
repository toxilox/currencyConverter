<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iso_4217', 3);
            $table->string('name', 255);
            $table->dateTime('date_created');
            $table->dateTime('date_modified');
            //$table->float('rate'); this becomes a DOUBLE field instead of a FLOAT
        });
        DB::statement('ALTER TABLE `currencies` ADD `rate` FLOAT NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
