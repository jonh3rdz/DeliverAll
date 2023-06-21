<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\V1\Rating\StoreRatingRequest;
use App\Http\Requests\API\V1\Rating\UpdateRatingRequest;
use App\Http\Resources\API\V1\Rating\RatingCollection;
use App\Http\Resources\API\V1\Rating\RatingResource;
use App\Models\API\V1\Rating;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RatingController extends Controller
{
    public function index()
    {
        return new RatingCollection(Rating::all());
    }

    public function search($field, $query)
    {
        return new RatingCollection(Rating::where($field, 'LIKE', "%$query%")->paginate(10));
    }

    public function store(StoreRatingRequest $request)
    {
        $rating = Rating::create($request->all());
        return response()->json([
            'res' => true,
            'data' => $rating,
            'msg' => 'Guardado correctamente'
        ], 201);
    }

    public function show($idRating)
    {
        try {
            $rating = Rating::findOrFail($idRating);
            return response()->json(new RatingResource($rating), 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'La calificación no existe'
            ], 404);
        }
    }

    public function update(UpdateRatingRequest $request, $idRating)
    {
        try {
            $rating = Rating::findOrFail($idRating);
            $rating->update($request->all());
            return response()->json([
                'res' => true,
                'data' => $rating,
                'msg' => 'Actualizado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'La calificación no existe'
            ], 404);
        }
    }

    public function destroy($idRating)
    {
        try {
            $rating = Rating::findOrFail($idRating);
            $rating->delete();

            return response()->json([
                'res' => true,
                'data' => $rating,
                'message' => 'Eliminado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'La calificación no existe'
            ], 404);
        }
    }
}