<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\V1\Notification\StoreNotificationRequest;
use App\Http\Requests\API\V1\Notification\UpdateNotificationRequest;
use App\Http\Resources\API\V1\Notification\NotificationCollection;
use App\Http\Resources\API\V1\Notification\NotificationResource;
use App\Models\API\V1\Notification;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NotificationController extends Controller
{
    public function index()
    {
        return new NotificationCollection(Notification::all());
    }

    public function search($field, $query)
    {
        return new NotificationCollection(Notification::where($field, 'LIKE', "%$query%")->paginate(10));
    }

    public function store(StoreNotificationRequest $request)
    {
        $notification = Notification::create($request->all());
        return response()->json([
            'res' => true,
            'data' => $notification,
            'msg' => 'Guardado correctamente'
        ], 201);
    }

    public function show($idNotification)
    {
        try {
            $notification = Notification::findOrFail($idNotification);
            return response()->json(new NotificationResource($notification), 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'La notificación no existe'
            ], 404);
        }
    }

    public function update(UpdateNotificationRequest $request, $idNotification)
    {
        try {
            $notification = Notification::findOrFail($idNotification);
            $notification->update($request->all());
            return response()->json([
                'res' => true,
                'data' => $notification,
                'msg' => 'Actualizado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'La notificación no existe'
            ], 404);
        }
    }

    public function destroy($idNotification)
    {
        try {
            $notification = Notification::findOrFail($idNotification);
            $notification->delete();

            return response()->json([
                'res' => true,
                'data' => $notification,
                'message' => 'Eliminado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'La notificación no existe'
            ], 404);
        }
    }
}
