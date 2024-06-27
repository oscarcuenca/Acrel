<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeterDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meter_data', function (Blueprint $table) {
            $table->id();
            $table->string('tempC');
            $table->string('tempB');
            $table->string('tempA');
            $table->integer('pt');
            $table->string('do2');
            $table->string('do1');
            $table->string('source');
            $table->integer('upInterval');
            $table->decimal('pa', 8, 2);
            $table->decimal('pb', 8, 2);
            $table->decimal('pc', 8, 2);
            $table->decimal('eqc', 8, 2);
            $table->string('state');
            $table->decimal('in', 8, 2);
            $table->decimal('epid', 8, 2);
            $table->decimal('epif', 8, 2);
            $table->decimal('epig', 8, 2);
            $table->decimal('pfa', 8, 2);
            $table->decimal('ep', 8, 2);
            $table->decimal('ua', 8, 2);
            $table->decimal('ub', 8, 2);
            $table->decimal('uc', 8, 2);
            $table->decimal('qa', 8, 2);
            $table->decimal('qb', 8, 2);
            $table->decimal('qc', 8, 2);
            $table->string('meterSn');
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
        Schema::dropIfExists('meter_data');
    }
}
