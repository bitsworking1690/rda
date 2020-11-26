@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4">
        <div class="card">
          <div class="card-header">Geo Places<span style="padding:5px; font-size: 12px;" class="badge badge-success float-right">general</span></div>
          <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="card">
          <div class="card-header">
            Geo Boundaries<span style="padding:5px; font-size: 12px;" class="badge badge-success float-right">general</span></div>
          <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
      <div class="card">
        <div class="card-header">
          Geo Health Facilities<span  style="padding:5px; font-size: 12px;" class="badge badge-success float-right">health</span>
        </div>
        <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
        </div>
      </div>
      </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>Dashboard</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                      <thead class="thead-dark">
                          <tr>
                            <th scope="col">Sr. No</th>
                            <th scope="col">Data Set</th>
                            <th scope="col">Data Count</th>
                            <th scope="col" colspan="4">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td>Geo Places</td>
                              <td>
                                <button type="button" class="btn btn-primary">
                                  provinces <span class="badge badge-light">8</span>
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-primary">
                                  divisions <span class="badge badge-light">33</span>
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-primary">
                                  districts <span class="badge badge-light">149</span>
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-primary">
                                  tehsils <span class="badge badge-light">550</span>
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-primary">
                                  ucs <span class="badge badge-light">7120</span>
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-primary">
                                  villages <span class="badge badge-light">60,000</span>
                                </button>
                              </td>
                              <td>
                                <a href="{{ route('place.index') }}">
                                  <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="List Places"><i class="fa fa-list"></i></button>
                                </a>
                                <a href="{{ url('/apis/specification/places') }}">
                                  <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="API Details"><i class="fa fa-external-link"></i></button>
                                </a>
                              </td>
                          </tr>
                          <tr>
                              <td>1</td>
                              <td>Geo Boundaries</td>
                              <td>
                                <button type="button" class="btn btn-primary">
                                  provinces <span class="badge badge-light">8</span>
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-primary">
                                  divisions <span class="badge badge-light">33</span>
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-primary">
                                  districts <span class="badge badge-light">4</span>
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-primary">
                                  tehsils <span class="badge badge-light">4</span>
                                </button>
                              </td>
                              <td>
                                <a href="{{ route('pgeometry.index') }}">
                                  <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="List Geometries"><i class="fa fa-list"></i></button>
                                </a>
                                <a href="{{ url('/apis/specification/geometries') }}">
                                  <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="API Details"><i class="fa fa-external-link"></i></button>
                                </a>
                              </td>
                          </tr>
                          <tr>
                              <td>1</td>
                              <td>Geo Health Facilities</td>
                              <td>
                                <button type="button" class="btn btn-primary">
                                  province(s) <span class="badge badge-light">1</span>
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-primary">
                                  districts <span class="badge badge-light">36</span>
                                </button>
                              </td>
                              <td>
                                <a href="{{ route('hfacility.index') }}">
                                  <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="List Health Facilities"><i class="fa fa-list"></i></button>
                                </a>
                                <a href="{{ url('/apis/specification/health_facilities') }}">
                                  <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="API Details"><i class="fa fa-external-link"></i></button>
                                </a>
                              </td>
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
