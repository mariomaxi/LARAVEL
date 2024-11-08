<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class IoTController extends Controller
{
    public function getData()
    {
        $data = Sensor::all();
        return response()->json(['data' => $data], 200);
    }

    public function postData(Request $request)
    {
        $validatedData = $request->validate([
            'temperature' => 'required',
            'moisture' => 'required|integer',
            'humidity' => 'required|integer',
            'relay' => 'required',
        ]);

        $sensor = Sensor::create($validatedData);

        return response()->json(['message' => 'Data saved successfully', 'data' => $sensor], 201);
    }
}
