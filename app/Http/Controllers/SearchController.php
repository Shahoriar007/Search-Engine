<?php

namespace App\Http\Controllers;

use App\Models\AddBusiness;
use App\Models\AddKeyword;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    // View all business list
    public function searchView()
    {  
        
        return view("search");
    }

    // Search bar
    // View all business list
    public function searchBar(Request $request)
    {  

        $word = $request->search;

        // $time_start = microtime(as_float: true );
        // $time_end = microtime(as_float: true );

        // $time = ($time_end - $time_start);

        $searchResult = DB::table('add_keywords')
        ->join('add_businesses', 'add_keywords.bus_id', '=', 'add_businesses.id')
        ->select('add_businesses.*')
        ->where('add_keywords.keyword','=',$word)
        ->get();
        
        return view('search',compact('searchResult','word'));
    }
}
