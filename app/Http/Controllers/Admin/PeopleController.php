<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacture;

class VehicleModelController extends Controller
{

    public function index()
    {
        return view('admin.pages.vehicle_model.index');
    }
    
}
