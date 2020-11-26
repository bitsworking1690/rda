<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $places = Place::all();
        return view('home' , compact('places'));
    }

    public function show_api_details($type){

        $places_api_intro = array(
        
                            'places' => 'This API helps in retrieving pakistan administrative places data in JSON form for use in mobile & web applications. Places data available in this order provinces -> divisions -> district -> tehsils -> union_councils -> villages. Data can be retrieved till 2 level nesting like divisions (in) provinces , districts (in) divisions , tehsils (in) provinces following order. Single level is allowable as seen in below examples.',

                            'geometries' => 'places introduction goes here',

                            'health_facilities' => 'places introduction goes here');

        $introduction = $places_api_intro[$type];

        return view('api_details',compact('type' , 'introduction'));
    }
}
