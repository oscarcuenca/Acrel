<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeterDataTable extends Migration
{
    public function up()
    {
        Schema::create('meter_data', function (Blueprint $table) {
            $table->id();
            $table->decimal('TempC', 5, 2);
            $table->decimal('TempB', 5, 2);
            $table->decimal('TempA', 5, 2);
            $table->integer('PT');
            $table->decimal('DO2', 5, 2);
            $table->decimal('DO1', 5, 2);
            $table->string('source', 20);
            $table->integer('UpInterval');
            $table->decimal('Pa', 5, 2);
            $table->decimal('Pb', 5, 2);
            $table->decimal('Pc', 5, 2);
            $table->decimal('EQC', 5, 2);
            $table->string('meterSn', 50);
            $table->bigInteger('timestamp');
            $table->dateTime('CreateTime');
            $table->string('state', 10);
            $table->decimal('IN', 5, 2);
            $table->decimal('EPID', 5, 2);
            $table->decimal('EPIF', 5, 2);
            $table->decimal('EPIG', 5, 2);
            $table->decimal('PFa', 5, 2);
            $table->decimal('EP', 5, 2);
            $table->decimal('Ua', 5, 2);
            $table->decimal('PFc', 5, 2);
            $table->decimal('EPIJ', 5, 2);
            $table->decimal('Ub', 5, 2);
            $table->decimal('PFb', 5, 2);
            $table->decimal('Uc', 5, 2);
            $table->decimal('Qa', 5, 2);
            $table->decimal('Qb', 5, 2);
            $table->decimal('Qc', 5, 2);
            $table->decimal('EPIP', 5, 2);
            $table->decimal('Uab', 5, 2);
            $table->decimal('Ia', 5, 2);
            $table->decimal('Ib', 5, 2);
            $table->decimal('Ic', 5, 2);
            $table->decimal('MEPIMD', 5, 2);
            $table->integer('timezone');
            $table->integer('DI0');
            $table->integer('DI2');
            $table->integer('DI1');
            $table->integer('DI3');
            $table->decimal('P', 5, 2);
            $table->decimal('Q', 5, 2);
            $table->decimal('S', 5, 2);
            $table->decimal('Ubc', 5, 2);
            $table->string('meterNo', 100);
            $table->bigInteger('msgid');
            $table->dateTime('MEPIMDT');
            $table->decimal('Fr', 5, 2);
            $table->decimal('Sa', 5, 2);
            $table->decimal('Sb', 5, 2);
            $table->decimal('Sc', 5, 2);
            $table->integer('CT');
            $table->decimal('Uca', 5, 2);
            $table->decimal('PF', 5, 2);
            $table->decimal('EPE', 5, 2);
            $table->string('gatewaySn', 50);
            $table->decimal('EPI', 5, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meter_data');
    }
}
