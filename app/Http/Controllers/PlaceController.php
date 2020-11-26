<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\HealthFacility;
use App\PlaceBoundary;
use DB;

class PlaceController extends Controller
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
        $places = Place::simplePaginate(20);
        // echo '<pre>';   print_r($places);    die;
        return view('places.index' , compact('places'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $campaignStatus = Place::lists('status', 'id');
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
                                'place_name' => 'required',
                                'place_short_name' => 'required',
                                'place_code' => 'required',
                                'place_type' => 'required',
                                'place_alt_spellings' => 'required'
                            ]);

        // $place = new Place([
        //     'place_name' => $this->request->get('place_name'),
        //     'place_short_name' => $this->request->get('place_short_name'),
        //     'place_code' => $this->request->get('place_code'),
        //     'place_alt_spellings' => $this->request->get('place_alt_spellings'),
        //     'place_type' => $this->request->get('place_type') 
        // ]);

        // $palce->save();

        $show = Place::create($validated_data);
        return redirect('/place')->with('success','Place saved successfully!');
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
     * places : show all pakistan administrative places till level 2
     *
     * @return \Illuminate\Http\Response
     */
    public function places(Request $request){
        
        $pakistan_places = $this->output_result($request);

        # Preparing Response Here
        $response['data']['message'] = (1) ? 'success' : 'error';
        $response['data']['description'] = "Listing all Pakistan Place(s)";
        $response['data']['filter'] = ($request->get('place_type')) ? $request->get('place_type') : "";
        $response['data']['result_count'] = count($pakistan_places);
        $response['data']['result_set'] = $pakistan_places;

        return response()->json($response);
    }

    private function output_result($request){
        
        # note : needs to be fixed with good way
        if($request->get('place_type')){
            $place_type = explode('|' , $request->get('place_type'));
            $result_set = Place::where('status',1)->whereIn('place_type' , $place_type);

            if($request->get('province_id')){
                $result_set = $result_set->where('province_id','=',$request->get('province_id'));
            }
            if($request->get('division_id')){
                $result_set = $result_set->where('division_id','=',$request->get('division_id'));
            }
            if($request->get('district_id')){
                $result_set = $result_set->where('district_id','=',$request->get('district_id'));
            }
            if($request->get('tehsil_id')){
                $result_set = $result_set->where('tehsil_id','=',$request->get('tehsil_id'));
            }
            if($request->get('uc_id')){
                $result_set = $result_set->where('uc_id','=',$request->get('uc_id'));
            }
            if($request->get('village_id')){
                $result_set = $result_set->where('village_id','=',$request->get('village_id'));
            }

            $result_set = $result_set->get()->toArray();
            // pf($result_set,1);
            // pf(DB::getQueryLog(),1);

            if(count($place_type) > 1){
                $group_by_id = array('province'=>'province_id','division'=>'division_id','district'=>'district_id','tehsil'=>'tehsil_id');
                $mapped_array = key_mapped_array($result_set,$place_type[0],$group_by_id[$place_type[0]]);
                // pf($mapped_array,1);

                $result_set = _group_by($result_set,$group_by_id[$place_type[0]]);
                // print_formatted($result_set,1);

                $temp_array = array();
                foreach($result_set as $key=>$res){
                    if(isset($mapped_array[$key]['place_name'])){
                        $temp_array['place_name'] = $mapped_array[$key]['place_name'];
                        $temp_array['place_type'] = $mapped_array[$key]['place_type'];
                        $temp_array[$place_type[1]] = $res;
                        $temp[] = $temp_array;
                    }
                }
                return $temp;
            }else{
                return $result_set;
            }
        }else{
            $result_set = Place::where('status',1)->skip(0)->take(8)->get()->toArray();
            return $result_set;
        }
    }

}//class-ends
