<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create(VehicleController $vehicleController)
    {
        return view('home', [
            'vehicle' => Vehicle::all(),
            'weekMaintenances' => $vehicleController->weekMaintenances()
        ]);
    }


}
