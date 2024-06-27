<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterData extends Model
{
    use HasFactory;

    protected $fillable = [
        'TempC',
        'TempB',
        'TempA',
        'PT',
        'DO2',
        'DO1',
        'source',
        'UpInterval',
        'Pa',
        'Pb',
        'Pc',
        'EQC',
        'meterSn',
        'timestamp',
        'CreateTime',
        'state',
        'IN',
        'EPID',
        'EPIF',
        'EPIG',
        'PFa',
        'EP',
        'Ua',
        'PFc',
        'EPIJ',
        'Ub',
        'PFb',
        'Uc',
        'Qa',
        'Qb',
        'Qc',
        'EPIP',
        'Uab',
        'Ia',
        'Ib',
        'Ic',
        'MEPIMD',
        'timezone',
        'DI0',
        'DI2',
        'DI1',
        'DI3',
        'P',
        'Q',
        'S',
        'Ubc',
        'meterNo',
        'msgid',
        'MEPIMDT',
        'Fr',
        'Sa',
        'Sb',
        'Sc',
        'CT',
        'Uca',
        'PF',
        'EPE',
        'gatewaySn',
        'EPI',
    ];
}
