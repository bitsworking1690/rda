@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>API Specifications : {{ ucfirst($type) }}</h4></div>

                <div class="card-body">

                    @if ($type == 'places')
                        <!-- Here Places -->
                        <h3>Introduction</h3>
                        <p>{{ $introduction }}</p>

                        <h3>Authentication</h3>
                            <ul>
                                <li>Nill</li>
                            </ul>
                        <h3 class="highlight">Endpoints</h3>
                            <ul>
                                <li><strong>places</strong></li>
                                    <p>This endpoint retrieves all places without nesting</p>
                                
                                <li><strong>HTTP Request</strong></li>
                                    <p>GET http://example/api/places</p>

                                <li><strong>Query Parameters</strong></li>
                                <p>- place_type (single) : options [province , division , district , tehsil , uc , village]</p>
                                <p>- place_type (multiple) : option1 | option2 | option3 ...</p>
                                <p>- place_id : options [province_id , division_id , district_id , tehsil_id , uc_id , village_id]</p>

                                <li><strong>Examples</strong></li>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>URL (http:example.com)</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ url('/api') }}/places?place_type=province</td>
                                            <td>Return all provinces</td>
                                        </tr>
                                        <tr>
                                            <td>{{ url('/api') }}/places?place_type=province|division</td>
                                            <td>Return all provinces & divisions within each province</td>
                                        </tr>
                                        <tr>
                                            <td>{{ url('/api') }}/places?place_type=province|division&province_id=7</td>
                                            <td>Return province matching province_id(punjab) & divisions in matching province(punjab)</td>
                                        </tr>

                                        <tr>
                                            <td>{{ url('/api') }}/places?place_type=division</td>
                                            <td>Return all divisions</td>
                                        </tr>
                                        <tr>
                                            <td>{{ url('/api') }}/places?place_type=division|district</td>
                                            <td>Return all divisions & district within each division</td>
                                        </tr>
                                        <tr>
                                            <td>{{ url('/api') }}/places?place_type=district|tehsil</td>
                                            <td>Return all districts & tehsils in each district</td>
                                        </tr>
                                        <tr>
                                            <td>{{ url('/api') }}/places?place_type=district|tehsil&district_id=1</td>
                                            <td>Return district matching district_id & tehsils in matching district</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </ul>
                        
                    @elseif ($type == 'geometries')
                        <!-- Here Health Facilities -->
                        <h3>Introduction</h3>
                        <p>{{ $introduction}}</p>

                        <h3>Authentication</h3>
                            <ul>
                                <li>Nill</li>
                            </ul>
                        <h3 class="highlight">Endpoints</h3>
                            <ul>
                                <li><strong>geometries</strong></li>
                                    <p>This endpoint retrieves all geometries</p>
                                
                                <li><strong>HTTP Request</strong></li>
                                    <p>GET http://example/api/geometries</p>

                                <li><strong>Query Parameters</strong></li>
                                    <p>- filter_type : options [province , division , district , tehsil]</p>
                                    <p>- filter_value : options [province_id , division_id , district_id , tehsil_id]</p>

                                <li><strong>Examples</strong></li>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>URL (http:example.com)</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ url('/api') }}/geometries?filter_type=province</td>
                                            <td>Return all provinces geometries</td>
                                        </tr>
                                        <tr>
                                            <td>{{ url('/api') }}/geometries?filter_type=division</td>
                                            <td>Return all divisions geometries</td>
                                        </tr>
                                        <tr>
                                            <td>{{ url('/api') }}/geometries?filter_type=district</td>
                                            <td>Return all districts geometries</td>
                                        </tr>

                                        <tr>
                                            <td>{{ url('/api') }}/geometries?filter_type=tehsil</td>
                                            <td>Return all tehsils geometries</td>
                                        </tr>

                                        <tr>
                                            <td>{{ url('/api') }}/geometries?filter_type=province&filter_value=province_id</td>
                                            <td>Return matching province geometry </td>
                                        </tr>
                                        <tr>
                                            <td>{{ url('/api') }}/geometries?filter_type=division&filter_value=division_id</td>
                                            <td>Return matching division geometry </td>
                                        </tr>
                                        <tr>
                                            <td>{{ url('/api') }}/geometries?filter_type=district&filter_value=district_id</td>
                                            <td>Return matching district geometry </td>
                                        </tr>
                                        <tr>
                                            <td>{{ url('/api') }}/geometries?filter_type=tehsil&filter_value=tehsil_id</td>
                                            <td>Return matching tehsil geometry </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </ul>
                    @else
                        <!-- Here Health Facilities -->
                        <h3>Introduction</h3>
                        <p>{{ $introduction}}</p>

                        <h3>Authentication</h3>
                            <ul>
                                <li>Nill</li>
                            </ul>
                        <h3 class="highlight">Endpoints</h3>
                            <ul>
                                <li><strong>healthfacilities</strong></li>
                                    <p>This endpoint retrieves all health facilities(available)</p>
                                
                                <li><strong>HTTP Request</strong></li>
                                    <p>GET http://example/api/healthfacilities</p>

                                <li><strong>Query Parameters</strong></li>
                                <p>- filter_type : options [province , district]</p>
                                <p>- filter_value : options [province_name(id) , district_name(id)]</p>

                                <li><strong>Examples</strong></li>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>URL (http:example.com)</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ url('/api') }}/healthfacilities</td>
                                            <td>Return all health facilities(available)</td>
                                        </tr>
                                        <tr>
                                            <td>{{ url('/api') }}/healthfacilities?filter_type=province</td>
                                            <td>Return all health facilities at province level</td>
                                        </tr>
                                        <tr>
                                            <td>{{ url('/api') }}/healthfacilities?filter_type=province&filter_value=punjab</td>
                                            <td>Return all health facilities at province level(punjab)</td>
                                        </tr>

                                        <tr>
                                            <td>{{ url('/api') }}/healthfacilities?filter_type=province&filter_value=kpk</td>
                                            <td>Return all health facilities at province level(kpk)</td>
                                        </tr>
                                        <tr>
                                            <td>{{ url('/api') }}/healthfacilities?filter_type=district&filter_value=attock</td>
                                            <td>Return all health facilities at district level(attock)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </ul>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
