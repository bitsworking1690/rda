<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HealthFacility;
use DB;

class HealthFacilityController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        DB::enableQueryLog();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hfacilities = HealthFacility::simplePaginate(20);
        return view('health_facilities.index' , compact('hfacilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * API Functions
    */

    /**
     * health_facilities : show all health_facilities(availabe)
     *
     * @return \Illuminate\Http\Response
     */
    public function health_facilities(Request $request){

        # Preparing Response Here
        $response['data']['message'] = (1) ? 'success' : 'error';
        $response['data']['description'] = "Listing all Pakistan Health Facilities(s)";
        $response['data']['filter'] = $request->get('filter_type');
        
        $filter_type = $request->get('filter_type');
        $filter_value = trim(strtolower($request->get('filter_value')));

        $result_set = HealthFacility::where('hf_status',1);
        if($filter_type == 'province'){
            $result_set = $result_set->whereRaw( 'lower(hf_province) like ? ' , [trim(strtolower($filter_value)).'%'] );
        }
        
        if($filter_type == 'district'){
            $result_set = $result_set->whereRaw( 'lower(hf_district) like ? ' , [trim(strtolower($filter_value)).'%'] );
        }

        $result_set = $result_set->get()->toArray();

        // pf(DB::getQueryLog(),1);

        $response['data']['result_count'] = count($result_set);
        $response['data']['result_set'] = $result_set;

        return response()->json($response);
    }

    public function apidetails(){
        echo ';here';
    }

}//class-ends
