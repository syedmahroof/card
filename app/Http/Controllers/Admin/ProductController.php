<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacture;

class ProductController extends Controller
{

    public function index($type='list')
    {
        return view('admin.pages.products.index',['$type' => $type]);
    }

    public function transactions($type='list')
    {
      
        return view('admin.pages.products.transaction',['$type' => $type]);
    }

    public function create($id=null,$viewFlag=0)
    {
        return view('admin.pages.products.create',compact('id','viewFlag'));
    }
    
    public function view($id=null,$viewFlag=0)
    {
        return view('admin.pages.products.view',compact('id','viewFlag'));
    }
    
}
