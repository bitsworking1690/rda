@extends('layouts.app')

@section('content')

<style type="text/css">
  .pagination{
    float: right !important;
  }
</style>
<div class="container">
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
                          <div class="col-md-3 mb-3">
                            <label for="country"><strong>Place Type</strong></label>
                            <select class="custom-select d-block w-100" id="country" required>
                              <option value="">Choose...</option>
                              <option value="province">Provinces</option>
                              <option value="division">Divisions</option>
                              <option value="district">Districts</option>
                              <option value="tehsil">Tehsils</option>
                              <option value="union_council">UCs</option>
                              <option value="village">Villages</option>
                            </select>
                          </div>
                          <div class="col-md-3 mb-3" style="margin-top: 8px;">
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
                              <td>{{ $place->place_type }}</td>
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
