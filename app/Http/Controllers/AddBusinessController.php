<?php

namespace App\Http\Controllers;

use App\Models\AddBusiness;
use Illuminate\Http\Request;

class AddBusinessController extends Controller
{
    // Add new business
    public function newBusinessAddView()
    {
        return view('admin.adminSection.newBusinessAdd');
    }

    // View all business list
    public function allBusinessListView()
    {
        $business = AddBusiness::all();

        return view('admin.adminSection.allBusinessList', compact('business'));
    }

    
}
