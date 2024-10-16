<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appointment;
use Carbon\Carbon; // Include Carbon for date manipulation

class AppointmentController extends Controller
{
    //get all appointment
    public function getAppointment(){
        $appoint = appointment::all();
        return response()->json($appoint, 200);
    }

    //get specific appointment
    public function getAppointmentById($id)
     {
         $appoin = appointment::find($id);
         if (is_null($appoin)) {
             return response()->json(['message' => 'appointment Not Found'], 404);
         }
         return response()->json($appoin, 200);
     }

    // Get appointments by email
    public function getAppointments(Request $request) {
        $email = $request->query('email');  // Retrieve email from query parameter
        if ($email) {
            // Ensure correct filtering by email
            $appointments = Appointment::where('email', $email)->get();

            if ($appointments->isEmpty()) {
                return response()->json(['message' => 'No appointments found for this email'], 404);
            }

            return response()->json($appointments, 200);  // Return matched appointments
        }

        return response()->json(['message' => 'Email is required'], 400);  // Bad Request if email is missing
    }

    //Create Appointment
    public function addAppointment(Request $request){
        $appoin = appointment::create($request->all());
        return response($appoin, 201);
    }


    // Update Appointment
    public function updateAppointment(Request $request, $id) {

        $appoin = Appointment::find($id);
        if (is_null($appoin)) {
            return response()->json(['message' => 'Appointment Not Found'], 404);
        }
        $appoin->update(array_merge($request->all(), ['updated_at' => Carbon::now()]));
        return response($appoin, 200);
    }



     // Delete appointment
     public function deleteAppointment($id)
     {
         $appoin = appointment::find($id);
         if (is_null($appoin)) {
             return response()->json(['message' => 'Appointment Not Found'], 404);
         }
         $appoin->delete();
         return response()->json(null, 204);
     }

}

