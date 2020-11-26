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
                <div class="card-header"><h4>Listing Healt Facilities</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Filters -->
                      <form>
                        <div class="row">
                          <div class="col-md-2">
                            <label for="country"><strong>Province</strong></label>
                            <select class="custom-select d-block w-100" id="country" required>
                              <option value="">Choose...</option>
                              <option value="province">Punjab</option>
                              <option value="division">KPK</option>
                            </select>
                          </div>
                          <div class="col-md-2">
                            <label for="country"><strong>District</strong></label>
                            <select class="custom-select d-block w-100" id="country" required>
                              <option value="">Choose...</option>
                              <option value="province">Attock</option>
                            </select>
                          </div>
                          <div class="col-md-2">
                            <label for="country"><strong>Type</strong></label>
                            <select class="custom-select d-block w-100" id="country" required>
                              <option value="">Choose...</option>
                              <option value="province">BHU</option>
                              <option value="division">THQ</option>
                            </select>
                          </div>
                          <div class="col-md-3 mb-3" style="margin-top: 8px;">
                            <br>
                            <button class="btn btn-primary btn-small" type="submit">Filter</button>
                          </div>
                          <div class="col-md-3 mb-3 text-right" style="margin-top: 8px;">
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
                            <th scope="col">Province</th>
                            <th scope="col">District</th>
                            <th scope="col" colspan="4">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($hfacilities as $hf)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $hf->hf_name }}</td>
                              <td>{{ $hf->hf_type }}</td>
                              <td>{{ ucfirst($hf->hf_province) }}</td>
                              <td>{{ $hf->hf_district }}</td>
                              <td>
                                <!-- Call to action buttons -->
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                        <a href="{{ route('hfacility.create') }}">
                                          <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-table"></i></button>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ route('hfacility.edit', $hf->id)}}">
                                          <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                    </li>
                                </ul>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                    {{ $hfacilities->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
