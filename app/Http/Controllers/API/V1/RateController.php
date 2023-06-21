<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\V1\Rate\StoreRateRequest;
use App\Http\Requests\API\V1\Rate\UpdateRateRequest;
use App\Http\Resources\API\V1\Rate\RateCollection;
use App\Http\Resources\API\V1\Rate\RateResource;
use App\Models\API\V1\Rate;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RateController extends Controller
{
    public function index()
    {
        return new RateCollection(Rate::all());
    }

    public function search($field, $query)
    {
        return new RateCollection(Rate::where($field, 'LIKE', "%$query%")->paginate(10));
    }

    public function store(StoreRateRequest $request)
    {
        $rate = Rate::create($request->all());
        return response()->json([
            'res' => true,
            'data' => $rate,
            'msg' => 'Guardado correctamente'
        ], 201);
    }

    public function show($idRate)
    {
        try {
            $rate = Rate::findOrFail($idRate);
            return response()->json(new RateResource($rate), 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'La tarifa no existe'
            ], 404);
        }
    }

    public function update(UpdateRateRequest $request, $idRate)
    {
        try {
            $rate = Rate::findOrFail($idRate);
            $rate->update($request->all());
            return response()->json([
                'res' => true,
                'data' => $rate,
                'msg' => 'Actualizado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'La tarifa no existe'
            ], 404);
        }
    }

    public function destroy($idRate)
    {
        try {
            $rate = Rate::findOrFail($idRate);
            $rate->delete();

            return response()->json([
                'res' => true,
                'data' => $rate,
                'message' => 'Eliminado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'La tarifa no existe'
            ], 404);
        }
    }
}
