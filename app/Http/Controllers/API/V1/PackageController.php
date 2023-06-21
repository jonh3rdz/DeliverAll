<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\V1\Package\StorePackageRequest;
use App\Http\Requests\API\V1\Package\UpdatePackageRequest;
use App\Http\Resources\API\V1\Package\PackageCollection;
use App\Http\Resources\API\V1\Package\PackageResource;
use App\Models\API\V1\Package;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PackageController extends Controller
{
    public function index()
    {
        return new PackageCollection(Package::all());
    }

    public function search($field, $query)
    {
        return new PackageCollection(Package::where($field, 'LIKE', "%$query%")->paginate(10));
    }

    public function store(StorePackageRequest $request)
    {
        $package = Package::create($request->all());
        return response()->json([
            'res' => true,
            'data' => $package,
            'msg' => 'Guardado correctamente'
        ], 201);
    }

    public function show($idPackage)
    {
        try {
            $package = Package::findOrFail($idPackage);
            return response()->json(new PackageResource($package), 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El paquete no existe'
            ], 404);
        }
    }

    public function update(UpdatePackageRequest $request, $idPackage)
    {
        try {
            $package = Package::findOrFail($idPackage);
            $package->update($request->all());
            return response()->json([
                'res' => true,
                'data' => $package,
                'msg' => 'Actualizado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El paquete no existe'
            ], 404);
        }
    }

    public function destroy($idPackage)
    {
        try {
            $package = Package::findOrFail($idPackage);
            $package->delete();

            return response()->json([
                'res' => true,
                'data' => $package,
                'message' => 'Eliminado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El paquete no existe'
            ], 404);
        }
    }
}
