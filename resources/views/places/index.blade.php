@extends('layouts.app')

@section('content')

<style type="text/css">
  .pagination{
    float: right !important;
  }

  .span_class{
    padding: 10px; font-size: 12px !important;
  }

  .download_buttons{
    /*width:460px;*/
  }
</style>

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>Listing Provinces</h4></div>

                <div class="card-body">
                    <table class="table table-bordered">
                      <thead class="thead-dark">
                          <tr>
                            <th scope="col">Sr. No</th>
                            <th scope="col">Name</th>
                            <th scope="col" colspan="4">Places</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td>ICT</td>
                              <td class="download_buttons" width="60%">
                                N/A
                              </td>
                          </tr>
                          <tr>
                              <td width="10%">2</td>
                              <td width="20%">Punjab</td>
                              <td width="70%">
                                <a class="btn btn-primary" href="{{ route('export' , [7 , 'all']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> All
                                </a>
                                |
                                <a class="btn btn-primary" href="{{ route('export' , [7 , 'division']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Divisions <span class="badge badge-light">8</span>
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [7 , 'district']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Districts <span class="badge badge-light">36</span>
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [7 , 'tehsil']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Tehsils <span class="badge badge-light">144</span>
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [7 , 'union_council']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Ucs <span class="badge badge-light">3726</span>
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [7 , 'village']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Villages <span class="badge badge-light">8000</span>
                                </a>
                              </td>
                          </tr>
                          <tr>
                              <td>3</td>
                              <td>Sindh</td>
                              <td class="download_buttons" width="60%">
                                <a class="btn btn-primary" href="{{ route('export' , [8 , 'all']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> All
                                </a>
                                |
                                <a class="btn btn-primary" href="{{ route('export' , [8 , 'division']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Divisions
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [8 , 'district']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Districts
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [8 , 'tehsil']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Tehsils
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [8 , 'union_council']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Ucs
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [8 , 'village']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Villages
                                </a>
                              </td>
                          </tr>
                          <tr>
                              <td>4</td>
                              <td>Kpk</td>
                              <td class="download_buttons" width="60%">
                                <a class="btn btn-primary" href="{{ route('export' , [6 , 'all']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> All
                                </a>
                                |
                                <a class="btn btn-primary" href="{{ route('export' , [6 , 'division']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Divisions
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [6 , 'district']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Districts
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [6 , 'tehsil']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Tehsils
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [6 , 'union_council']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Ucs
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [6 , 'village']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Villages
                                </a>
                              </td>
                          </tr>
                          <tr>
                              <td>5</td>
                              <td>Balochistan</td>
                              <td class="download_buttons" width="60%">
                                <a class="btn btn-primary" href="{{ route('export' , [2 , 'all']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> All
                                </a>
                                |
                                <a class="btn btn-primary" href="{{ route('export' , [2 , 'division']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Divisions
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [2 , 'district']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Districts
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [2 , 'tehsil']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Tehsils
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [2 , 'union_council']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Ucs
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [2 , 'village']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Villages
                                </a>
                              </td>
                          </tr>
                          <tr>
                              <td>6</td>
                              <td>AJK</td>
                              <td class="download_buttons" width="60%">
                                <a class="btn btn-primary" href="{{ route('export' , [1 , 'all']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> All
                                </a>
                                |
                                <a class="btn btn-primary" href="{{ route('export' , [1 , 'division']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Divisions
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [1 , 'district']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Districts
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [1 , 'tehsil']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Tehsils
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [1 , 'union_council']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Ucs
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [1 , 'village']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Villages
                                </a>
                              </td>
                          </tr>
                          <tr>
                              <td>7</td>
                              <td>GB</td>
                              <td class="download_buttons" width="60%">
                                <a class="btn btn-primary" href="{{ route('export' , [4 , 'all']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> All
                                </a>
                                |
                                <a class="btn btn-primary" href="{{ route('export' , [4 , 'division']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Divisions
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [4 , 'district']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Districts
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [4 , 'tehsil']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Tehsils
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [4 , 'union_council']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Ucs
                                </a>
                                <a class="btn btn-primary" href="{{ route('export' , [4 , 'village']) }}">
                                  <i class="fa fa-arrow-circle-o-down"></i> Villages
                                </a>
                              </td>
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>Listing Places</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Filters -->
                    <form method="post" action="{{ route('place.store') }}">
                        <div class="row">
                          <div class="col-md-2">
                            <label for="country"><strong>Province</strong></label>
                            <select class="custom-select d-block w-100" id="country" required>
                              <option value="">Choose...</option>
                              <option value="province">ICT</option>
                              <option value="division">Punjab</option>
                              <option value="district">Sindh</option>
                              <option value="tehsil">KPK</option>
                              <option value="union_council">Balochistan</option>
                              <option value="village">GB</option>
                              <option value="village">AJK</option>
                            </select>
                          </div>

                          <div class="col-md-2">
                            <label for="country"><strong>Place Type</strong></label>
                            <select class="custom-select d-block w-100" id="country" required>
                              <option value="">Choose...</option>
                              <option value="division">Divisions</option>
                              <option value="district">Districts</option>
                              <option value="tehsil">Tehsils</option>
                              <option value="union_council">UCs</option>
                              <option value="village">Villages</option>
                            </select>
                          </div>

                          <div class="col-md-2" style="margin-top: 8px;">
                            <br>
                            <button class="btn btn-primary btn-small" type="submit">Filter</button>
                          </div>
                          <div class="col-md-6 mb-3 text-right" style="margin-top: 8px;">
                              <br>
                              <a class="btn btn-primary resource-url-analytics resource-type-None" href="https://opendata.com.pk/dataset/e5224155-8164-4298-a52a-adeb7f0cab6b/resource/b5bc1d17-840b-4421-95a0-942634d16487/download/kp_tribal_districts_hf_registry_v2_20180320.xlsx">
                                  <i class="fa fa-arrow-circle-o-down"></i> Download
                              </a>
                          </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                      <thead class="thead-dark">
                          <tr>
                            <th scope="col">Sr. No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col" colspan="4">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($places as $place)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $place->place_name }}</td>
                              <td><span class="badge badge-success" style="padding: 5px; font-size: 12px;">{{ $place->place_type }}</span></td>
                              <td>
                                <!-- Call to action buttons -->
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                        <a href="{{ route('place.create') }}">
                                          <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-table"></i></button>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ route('place.edit', $place->id)}}">
                                          <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                    </li>
                                </ul>
                              </td>
                              <!-- <td><a href="{{ route('place.edit', $place->id)}}" class="btn btn-primary">Edit</a></td>
                              <td>
                                  <form action="{{ route('place.destroy', $place->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                  </form>
                              </td> -->
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                    {{ $places->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
