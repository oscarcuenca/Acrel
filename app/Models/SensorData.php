<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    protected $table = 'sensor_data';

    protected $fillable = [
        'tempC',
        'tempB',
        'tempA',
        'pt',
        'do2',
        'do1',
        'source',
        'upInterval',
        'pa',
        'pb',
        'pc',
        'eqc',
        'state',
        'in',
        'epid',
        'epif',
        'epig',
        'pfa',
        'ep',
        'ua',
        'ub',
        'uc',
        'qa',
        'qb',
        'qc',
        'meterSn'
    ];
}
