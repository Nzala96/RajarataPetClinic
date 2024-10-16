<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{

    //get all Customers
    public function getCustomer(){
        $cust = Customer::all();
        return response()->json($cust, 200);
    }

    //get specific Customer
    public function getCustomerById($id)
     {
         $cus = Customer::find($id);
         if (is_null($appoin)) {
             return response()->json(['message' => 'Customer Not Found'], 404);
         }
         return response()->json($cus, 200);
     }


    //Add Customers
    public function addCustomer(Request $request){
        $cus = Customer::create($request->all());
        return response($cus, 201);
    }


     // Update Customer details
    public function updateCustomer(Request $request, $id)
    {
    $cus = Customer::find($id);
    if (is_null($cus)) {
        return response()->json(['message' => 'Customer Not Found'], 404);
    }
    $cus->update($request->all());
    return response($cus, 200);
    }



     // Delete Customer
     public function deleteCustomer($id)
     {
         $cus = Customer::find($id);
         if (is_null($cus)) {
             return response()->json(['message' => 'Customer Not Found'], 404);
         }
         $cus->delete();
         return response()->json(null, 204);
     }

}
