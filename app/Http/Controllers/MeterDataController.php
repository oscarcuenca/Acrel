<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeterData;

class MeterDataController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        
        foreach ($data as $record) {
            MeterData::create($record);
        }

        return response()->json(['message' => 'Data inserted successfully'], 201);
    }
}
