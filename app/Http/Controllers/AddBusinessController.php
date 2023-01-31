<?php

namespace App\Http\Controllers;

use App\Models\AddBusiness;
use Illuminate\Http\Request;

class AddBusinessController extends Controller
{
    public function newBusinessAddView()
    {
        return view('admin.adminSection.newBusinessAdd');
    }

    
}
