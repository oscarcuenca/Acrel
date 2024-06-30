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
            $table->decimal('TempC', 8, 2);
            $table->decimal('TempB', 8, 2);
            $table->decimal('TempA', 8, 2);
            $table->integer('PT');
            $table->decimal('DO2', 8, 2);
            $table->decimal('DO1', 8, 2);
            $table->string('source');
            $table->integer('UpInterval');
            $table->decimal('Pa', 8, 2);
            $table->decimal('Pb', 8, 2);
            $table->decimal('Pc', 8, 2);
            $table->decimal('EQC', 8, 2);
            $table->integer('meter_id'); // Cambié 'id' a 'meter_id' para evitar conflicto con el ID automático de la tabla
            $table->decimal('Lg', 8, 2);
            $table->string('state');
            $table->decimal('EQL', 8, 2);
            $table->decimal('IN', 8, 2);
            $table->decimal('EPID', 8, 2);
            $table->decimal('EPIF', 8, 2);
            $table->decimal('EPIG', 8, 2);
            $table->decimal('PFa', 8, 2);
            $table->decimal('EP', 8, 2);
            $table->decimal('Ua', 8, 2);
            $table->decimal('PFc', 8, 2);
            $table->decimal('EPIJ', 8, 2);
            $table->decimal('Ub', 8, 2);
            $table->decimal('PFb', 8, 2);
            $table->decimal('Uc', 8, 2);
            $table->decimal('Qa', 8, 2);
            $table->decimal('Qb', 8, 2);
            $table->decimal('Qc', 8, 2);
            $table->decimal('EPIP', 8, 2);
            $table->string('meterSn');
            $table->decimal('Uab', 8, 2);
            $table->decimal('Ia', 8, 2);
            $table->decimal('Ib', 8, 2);
            $table->decimal('Ic', 8, 2);
            $table->decimal('MEPIMD', 8, 2);
            $table->integer('timezone');
            $table->decimal('DI0', 8, 2);
            $table->decimal('DI2', 8, 2);
            $table->decimal('DI1', 8, 2);
            $table->decimal('DI3', 8, 2);
            $table->decimal('P', 8, 2);
            $table->decimal('Q', 8, 2);
            $table->decimal('S', 8, 2);
            $table->decimal('Ubc', 8, 2);
            $table->string('meterNo');
            $table->dateTime('timestamp'); // Ajuste a dateTime para consistencia
            $table->dateTime('CreateTime');
            $table->bigInteger('msgid');
            $table->dateTime('MEPIMDT');
            $table->decimal('Fr', 8, 2);
            $table->decimal('Sa', 8, 2);
            $table->decimal('Sb', 8, 2);
            $table->decimal('Sc', 8, 2);
            $table->integer('CT');
            $table->decimal('Uca', 8, 2);
            $table->decimal('PF', 8, 2);
            $table->decimal('EPE', 8, 2);
            $table->string('gatewaySn');
            $table->decimal('EPI', 8, 2);
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

