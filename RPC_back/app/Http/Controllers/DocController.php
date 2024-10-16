<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctors;

class DocController extends Controller
{
    //get all doctors
    public function getDoctors(){
        $doctors = doctors::all();
        return response()->json($doctors, 200);
    }

    //get specific Doctor
    public function getDoctorById($id)
     {
         $doc = doctors::find($id);
         if (is_null($doc)) {
             return response()->json(['message' => 'appointment Not Found'], 404);
         }
         return response()->json($doc, 200);
     }


    //Add Doctor
    public function addDoc(Request $request){

        // Check if a doctor with the same email already exists
        $existingDoctor = doctors::where('demail', $request->demail)->first();

        if ($existingDoctor) {
            return response()->json(['message' => 'Doctor already created'], 409); // 409 Conflict
        }

        // Create the new doctor
        $doc = doctors::create($request->all());

        return response($doc, 201);
    }


     // Update Doctor details
    public function updateDoc(Request $request, $id)
    {
    $doc = doctors::find($id);
    if (is_null($doc)) {
        return response()->json(['message' => 'Appointment Not Found'], 404);
    }
    $doc->update($request->all());
    return response($doc, 200);
    }



     // Delete doctor details
     public function deleteDoc($id)
     {
         $doc = doctors::find($id);
         if (is_null($doc)) {
             return response()->json(['message' => 'Appointment Not Found'], 404);
         }
         $doc->delete();
         return response()->json(null, 204);
     }

}



