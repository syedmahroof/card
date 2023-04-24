<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacture;

class ContactController extends Controller
{

    public function index($type='list')
    {
        return view('admin.pages.contacts.index',['$type' => $type]);
    }
  
}
