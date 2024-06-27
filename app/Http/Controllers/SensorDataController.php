<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    public function store(Request $request)
    {
        // Lógica para manejar el almacenamiento de datos de sensores
        // Validar y procesar los datos recibidos
        $data = $request->validate([
            'tempC' => 'required|string',
            'tempB' => 'required|string',
            'tempA' => 'required|string',
            'pt' => 'required|integer',
            'do2' => 'required|string',
            'do1' => 'required|string',
            'source' => 'required|string',
            'upInterval' => 'required|integer',
            'pa' => 'required|numeric',
            'pb' => 'required|numeric',
            'pc' => 'required|numeric',
            'eqc' => 'required|numeric',
            'state' => 'required|string',
            'in' => 'required|numeric',
            'epid' => 'required|numeric',
            'epif' => 'required|numeric',
            'epig' => 'required|numeric',
            'pfa' => 'required|numeric',
            'ep' => 'required|numeric',
            'ua' => 'required|numeric',
            'ub' => 'required|numeric',
            'uc' => 'required|numeric',
            'qa' => 'required|numeric',
            'qb' => 'required|numeric',
            'qc' => 'required|numeric',
            'meterSn' => 'required|string',
        ]);

        // Guardar los datos en la base de datos o realizar otras acciones
        // ...

        return response()->json(['message' => 'Data stored successfully', 'data' => $data]);
    }
}
