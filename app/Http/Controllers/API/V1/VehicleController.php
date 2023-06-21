<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\V1\Vehicle\StoreVehicleRequest;
use App\Http\Requests\API\V1\Vehicle\UpdateVehicleRequest;
use App\Http\Resources\API\V1\Vehicle\VehicleCollection;
use App\Http\Resources\API\V1\Vehicle\VehicleResource;
use App\Models\API\V1\Vehicle;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VehicleController extends Controller
{
    public function index()
    {
        return new VehicleCollection(Vehicle::all());
    }

    public function search($field, $query)
    {
        return new VehicleCollection(Vehicle::where($field, 'LIKE', "%$query%")->paginate(10));
    }

    public function store(StoreVehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->all());
        return response()->json([
            'res' => true,
            'data' => $vehicle,
            'msg' => 'Guardado correctamente'
        ], 201);
    }

    public function show($idVehicle)
    {
        try {
            $vehicle = Vehicle::findOrFail($idVehicle);
            return response()->json(new VehicleResource($vehicle), 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El vehículo no existe'
            ], 404);
        }
    }

    public function update(UpdateVehicleRequest $request, $idVehicle)
    {
        try {
            $vehicle = Vehicle::findOrFail($idVehicle);
            $vehicle->update($request->all());
            return response()->json([
                'res' => true,
                'data' => $vehicle,
                'msg' => 'Actualizado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El vehículo no existe'
            ], 404);
        }
    }

    public function destroy($idVehicle)
    {
        try {
            $vehicle = Vehicle::findOrFail($idVehicle);
            $vehicle->delete();

            return response()->json([
                'res' => true,
                'data' => $vehicle,
                'message' => 'Eliminado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El vehículo no existe'
            ], 404);
        }
    }
}
