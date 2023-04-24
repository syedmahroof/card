<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacture;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.pages.categories.index');
    }

    public function create($id=null,$viewFlag=0)
    {
        return view('admin.pages.categories.create',compact('id','viewFlag'));
    }
    
    public function view($id=null,$viewFlag=0)
    {
        return view('admin.pages.categories.view',compact('id','viewFlag'));
    }
    
}
