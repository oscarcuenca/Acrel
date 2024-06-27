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
            $table->string('pt');
            $table->string('do2');
            $table->string('do1');
            $table->string('source');
            $table->integer('upInterval');
            $table->decimal('pa', 8, 3);
            $table->decimal('pb', 8, 3);
            $table->decimal('pc', 8, 3);
            $table->decimal('eqc', 8, 3);
            $table->string('state');
            $table->decimal('in', 8, 3);
            $table->decimal('epid', 8, 3);
            $table->decimal('epif', 8, 3);
            $table->decimal('epig', 8, 3);
            $table->decimal('pfa', 8, 3);
            $table->decimal('ep', 8, 3);
            $table->integer('ua');
            $table->integer('ub');
            $table->integer('uc');
            $table->decimal('qa', 8, 3);
            $table->decimal('qb', 8, 3);
            $table->decimal('qc', 8, 3);
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

