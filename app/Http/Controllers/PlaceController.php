<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Using other models for accessing these */
use App\Place;
use App\HealthFacility;
use App\PlaceBoundary;
use DB;

/* Using exports */
use App\Exports\PlacesExport;
use Maatwebsite\Excel\Facades\Excel;

class PlaceController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        DB::enableQueryLog();
    }

    /**
     * Export places data.
     */
    public function export($province_id,$place_type)
    {
        $pakistan_provinces = array(1=>'AJK',
                                    2=>'Baluchistan',
                                    3=>'FATA',
                                    4=>'GB',
                                    5=>'ICT',
                                    6=>'KPK',
                                    7=>'Punjab',
                                    8=>'Sindh',
                                );
        // return Excel::download(new PlacesExport , 'places.xlsx');
        
        // passing filtered data for downloading
        if($place_type == 'all'){
            $places = Place::where('province_id',$province_id)->get();
        }else{
            $places = Place::where('province_id',$province_id)->where('place_type' , $place_type)->get(['place_name',
            'place_name_urdu',
            'place_short_name',
            'place_alt_spellings',
            'place_code',
            'place_lat_long',
            'place_type',
            'place_name_filter',
            'province_id',
            'division_id',
            'district_id',
            'tehsil_id',
            'uc_id',
            'village_id',
            'province_name',
            'division_name',
            'district_name',
            'tehsil_name',
            'uc_name',
            'village_name',]);
        }

        /* converting eloquent collections to array */
        $places_filtered = array();
        foreach($places as $place){
            array_push($places_filtered ,$place);
        }
        
        $export = new PlacesExport($places_filtered);
        // echo '<pre>';   print_r($export);  die;
        return Excel::download($export , strtolower($pakistan_provinces[$province_id]).'_'.$place_type.'s.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // request params
        // echo $request->post('province');  die;
        $places = Place::whereIn('province_id',array(1,7))->whereIn('place_type',array('district','division'))->simplePaginate(20);
        return view('places.index' , compact('places'));
    }

    public function listing(Request $request)
    {
        // request params
        // echo '<pre>';    print_r($request->post());  die;
        $places = Place::where('province_id',7)->whereIn('place_type',array('district','division'))->simplePaginate(20);

        // $province_id = $request->post('province');
        // $place_type = $request->post('place_type');
        // $places = Place::where('province_id',$province_id)->whereIn('place_type',$place_type)->simplePaginate(20);
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

    /*

    */

}//class-ends
