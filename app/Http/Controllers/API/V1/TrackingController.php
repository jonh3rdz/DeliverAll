<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\V1\Tracking\StoreTrackingRequest;
use App\Http\Requests\API\V1\Tracking\UpdateTrackingRequest;
use App\Http\Resources\API\V1\Tracking\TrackingCollection;
use App\Http\Resources\API\V1\Tracking\TrackingResource;
use App\Models\API\V1\Tracking;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TrackingController extends Controller
{
    public function index()
    {
        return new TrackingCollection(Tracking::all());
    }

    public function search($field, $query)
    {
        return new TrackingCollection(Tracking::where($field, 'LIKE', "%$query%")->paginate(10));
    }

    public function store(StoreTrackingRequest $request)
    {
        $tracking = Tracking::create($request->all());
        return response()->json([
            'res' => true,
            'data' => $tracking,
            'msg' => 'Guardado correctamente'
        ], 201);
    }

    public function show($idTracking)
    {
        try {
            $tracking = Tracking::findOrFail($idTracking);
            return response()->json(new TrackingResource($tracking), 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El seguimiento no existe'
            ], 404);
        }
    }

    public function update(UpdateTrackingRequest $request, $idTracking)
    {
        try {
            $tracking = Tracking::findOrFail($idTracking);
            $tracking->update($request->all());
            return response()->json([
                'res' => true,
                'data' => $tracking,
                'msg' => 'Actualizado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El seguimiento no existe'
            ], 404);
        }
    }

    public function destroy($idTracking)
    {
        try {
            $tracking = Tracking::findOrFail($idTracking);
            $tracking->delete();

            return response()->json([
                'res' => true,
                'data' => $tracking,
                'message' => 'Eliminado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El seguimiento no existe'
            ], 404);
        }
    }
}
