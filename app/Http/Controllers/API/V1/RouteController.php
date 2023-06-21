<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\V1\Route\StoreRouteRequest;
use App\Http\Requests\API\V1\Route\UpdateRouteRequest;
use App\Http\Resources\API\V1\Route\RouteCollection;
use App\Http\Resources\API\V1\Route\RouteResource;
use App\Models\API\V1\Route;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RouteController extends Controller
{
    public function index()
    {
        return new RouteCollection(Route::all());
    }

    public function search($field, $query)
    {
        return new RouteCollection(Route::where($field, 'LIKE', "%$query%")->paginate(10));
    }

    public function store(StoreRouteRequest $request)
    {
        $route = Route::create($request->all());
        return response()->json([
            'res' => true,
            'data' => $route,
            'msg' => 'Guardado correctamente'
        ], 201);
    }

    public function show($idRoute)
    {
        try {
            $route = Route::findOrFail($idRoute);
            return response()->json(new RouteResource($route), 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'La ruta no existe'
            ], 404);
        }
    }

    public function update(UpdateRouteRequest $request, $idRoute)
    {
        try {
            $route = Route::findOrFail($idRoute);
            $route->update($request->all());
            return response()->json([
                'res' => true,
                'data' => $route,
                'msg' => 'Actualizado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'La ruta no existe'
            ], 404);
        }
    }

    public function destroy($idRoute)
    {
        try {
            $route = Route::findOrFail($idRoute);
            $route->delete();

            return response()->json([
                'res' => true,
                'data' => $route,
                'message' => 'Eliminado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'La ruta no existe'
            ], 404);
        }
    }
}
