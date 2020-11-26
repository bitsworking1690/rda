<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlaceBoundary;
use DB;

class PlaceGeometryController extends Controller
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
        $geometries = PlaceBoundary::simplePaginate(20);
        return view('place_geometries.index',compact('geometries'));
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
     * geometries : show all pakistan administrative geometries(boundaries)
     *
     * @return \Illuminate\Http\Response
     */
    public function geometries(Request $request){

        # Preparing Response Here
        $response['data']['message'] = (1) ? 'success' : 'error';
        $response['data']['description'] = "Listing all Pakistan Boundary(ies)";
        $response['data']['filter'] = $request->get('filter_type');
        
        $filter_type = $request->get('filter_type');
        $filter_value = trim(strtolower($request->get('filter_value')));

        $result_set = PlaceBoundary::where(['geometry_status'=>1 , 'geometry_type'=>$filter_type]);
        if($filter_value && $filter_type == 'province'){
            $result_set = $result_set->where('geometry_province_id' , $filter_value);
        }
        
        if($filter_value && $filter_type == 'division'){
            $result_set = $result_set->where('geometry_division_id' , $filter_value);
        }

        if($filter_value && $filter_type == 'district'){
            $result_set = $result_set->where('geometry_district_id' , $filter_value);
        }

        if($filter_value && $filter_type == 'tehsil'){
            $result_set = $result_set->where('geometry_tehsil_id' , $filter_value);
        }

        $result_set = $result_set->get()->toArray();

        // pf(DB::getQueryLog(),1);

        $response['data']['result_count'] = count($result_set);
        $response['data']['result_set'] = $result_set;

        return response()->json($response);
    }

}//class-ends
