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
        ini_set('max_execution_time', 3000);
        /* Formatting boundaries data */
        // $geometries = PlaceBoundary::where('geometry_type','district')->where('id','>=',106)->get();
        $geometry_type = 'tehsil';
        $geometries = PlaceBoundary::where('geometry_type',$geometry_type)->where('geometry_status','1')->get();
        foreach($geometries as $data){
            $points_data = $this->get_array($data->geometry_points);
            $html = "SET @g = 'POLYGON((".$points_data."))';"."\n";
            $html .= "UPDATE place_boundaries SET geometry_points_polygon = PolygonFromText(@g) WHERE id = {$data->id} AND geometry_type = '{$geometry_type}';";

            echo $html; echo "\n";
            $html = '';
        }
        die;
        /* Formatting boundaries data */

        $geometries = PlaceBoundary::simplePaginate(20);
        return view('place_geometries.index',compact('geometries'));
    }

    public function get_array($geometry_points,$is_old_polygon=false){
        $geometry_points_array = array();
        $exploded_points = explode(',',$geometry_points);

        if($is_old_polygon){
            $key = array_search('0.0',$exploded_points);
            if($key === FALSE){
                if(count($exploded_points)) {
                    $points_length = count($exploded_points);
                    for($i=0;$i<$points_length;$i=$i+2){
                        if(isset($exploded_points[$i]) && isset($exploded_points[$i+1])){
                            $geometry_points_array [] = str_replace('0 ', '', str_replace('0.0 ', '', $exploded_points[$i])) . ' ' . $exploded_points[$i+1];
                        }
                    }
                }
            }else{
                unset($exploded_points[$key]);
                if(count($exploded_points)) {
                    $points_length = count($exploded_points);   //24
                    for($i=0;$i<$points_length;$i=$i+2){
                        if(isset($exploded_points[$i]) && isset($exploded_points[$i+1])){
                            $geometry_points_array [] = str_replace('0 ', '', str_replace('0.0 ', '', $exploded_points[$i])) . ' ' . $exploded_points[$i+1];
                        }
                    }
                }
            }
        }else{
            if(count($exploded_points)) {
                $points_length = count($exploded_points);
                for($i=0;$i<$points_length;$i=$i+2){
                    if(isset($exploded_points[$i]) && isset($exploded_points[$i+1])){

                        // removing altitude in point and formatting for using it in in_polygon_function @ 26-01-2021
                        $geometry_points_array [] = str_replace('0.0 ', '', $exploded_points[$i]) . ' ' . str_replace('0.0 ', '', $exploded_points[$i+1]);
                        // $geometry_points_array [] = $exploded_points[$i] . ' ' . $exploded_points[$i+1];
                    }
                }
            }
        }

       // echo '<pre>';   print_r($geometry_points_array);    die;
        return implode(',',$geometry_points_array);
        // return $geometry_points_array;
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
