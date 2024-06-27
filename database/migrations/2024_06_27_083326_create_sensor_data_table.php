<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();
            $table->string('tempC');
            $table->string('tempB');
            $table->string('tempA');
            $table->integer('pt');
            $table->string('do2');
            $table->string('do1');
            $table->string('source');
            $table->integer('upInterval');
            $table->float('pa', 8, 3);
            $table->float('pb', 8, 3);
            $table->float('pc', 8, 3);
            $table->float('eqc', 8, 2);
            $table->string('state');
            $table->float('in', 8, 2);
            $table->float('epid', 8, 3);
            $table->float('epif', 8, 3);
            $table->float('epig', 8, 3);
            $table->float('pfa', 8, 3);
            $table->float('ep', 8, 2);
            $table->float('ua', 8, 1);
            $table->float('ub', 8, 1);
            $table->float('uc', 8, 1);
            $table->float('qa', 8, 3);
            $table->float('qb', 8, 3);
            $table->float('qc', 8, 3);
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
        Schema::dropIfExists('sensor_data');
    }
}
