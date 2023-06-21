<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\V1\Router\StoreRouterRequest;
use App\Http\Requests\API\V1\Router\UpdateRouterRequest;
use App\Http\Resources\API\V1\Router\RouterCollection;
use App\Http\Resources\API\V1\Router\RouterResource;
use App\Models\API\V1\Router;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RouterController extends Controller
{
    public function index()
    {
        return new RouterCollection(Router::all());
    }

    public function search($field, $query)
    {
        return new RouterCollection(Router::where($field, 'LIKE', "%$query%")->paginate(10));
    }

    public function store(StoreRouterRequest $request)
    {
        $router = Router::create($request->all());
        return response()->json([
            'res' => true,
            'data' => $router,
            'msg' => 'Guardado correctamente'
        ], 201);
    }

    public function show($idRouter)
    {
        try {
            $router = Router::findOrFail($idRouter);
            return response()->json(new RouterResource($router), 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El router no existe'
            ], 404);
        }
    }

    public function update(UpdateRouterRequest $request, $idRouter)
    {
        try {
            $router = Router::findOrFail($idRouter);
            $router->update($request->all());
            return response()->json([
                'res' => true,
                'data' => $router,
                'msg' => 'Actualizado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El router no existe'
            ], 404);
        }
    }

    public function destroy($idRouter)
    {
        try {
            $router = Router::findOrFail($idRouter);
            $router->delete();

            return response()->json([
                'res' => true,
                'data' => $router,
                'message' => 'Eliminado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El router no existe'
            ], 404);
        }
    }
}
