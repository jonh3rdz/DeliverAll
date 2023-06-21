<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\V1\Customer\StoreCustomerRequest;
use App\Http\Requests\API\V1\Customer\UpdateCustomerRequest;
use App\Http\Resources\API\V1\Customer\CustomerCollection;
use App\Http\Resources\API\V1\Customer\CustomerResource;
use App\Models\API\V1\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomerController extends Controller
{
    public function index()
    {
        return new CustomerCollection(Customer::all());
    }

    public function search($field, $query)
    {
        return new CustomerCollection(Customer::where($field, 'LIKE', "%$query%")->paginate(10));
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->all());
        return response()->json([
            'res' => true,
            'data' => $customer,
            'msg' => 'Guardado correctamente'
        ], 201);
    }

    public function show($idCustomer)
    {
        try {
            $customer = Customer::findOrFail($idCustomer);
            return response()->json(new CustomerResource($customer), 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El cliente no existe'
            ], 404);
        }
    }

    public function update(UpdateCustomerRequest $request, $idCustomer)
    {
        try {
            $customer = Customer::findOrFail($idCustomer);
            $customer->update($request->all());
            return response()->json([
                'res' => true,
                'data' => $customer,
                'msg' => 'Actualizado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El cliente no existe'
            ], 404);
        }
    }

    public function destroy($idCustomer)
    {
        try {
            $customer = Customer::findOrFail($idCustomer);
            $customer->delete();

            return response()->json([
                'res' => true,
                'data' => $customer,
                'message' => 'Eliminado correctamente'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'res' => false,
                'msg' => 'El cliente no existe'
            ], 404);
        }
    }
}
