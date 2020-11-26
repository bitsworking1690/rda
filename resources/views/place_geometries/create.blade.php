@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <h1>Add a Place</h1>
      <div>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div><br />
        @endif
          <form method="post" action="{{ route('place.store') }}">
              {{ csrf_field() }}
              <div class="form-group">    
                  <label for="first_name">Place Name:</label>
                  <input type="text" class="form-control" name="place_name"/>
              </div>

              <div class="form-group">
                  <label for="last_name">Place Short Name:</label>
                  <input type="text" class="form-control" name="place_short_name"/>
              </div>

              <div class="form-group">
                  <label for="email">Place Code:</label>
                  <input type="text" class="form-control" name="place_code"/>
              </div>
              <div class="form-group">
                  <label for="city">Place Alt Spellings:</label>
                  <input type="text" class="form-control" name="place_alt_spellings"/>
              </div>
              <div class="form-group">
                  <label for="country">Place Type:</label>
                  <!-- <input type="text" class="form-control" name="country"/> -->
                  <select class="form-control" name="place_type">
                    <!--
                    'province','division','district','tehsil','union_council','village' 
                     -->
                    <option value="province">Province</option>
                    <option value="division">Division</option>
                    <option value="district">District</option>
                    <option value="tehsil">Tehsil</option>
                    <option value="union_council">UC</option>
                    <option value="village">Village</option>
                  </select>
              </div>
              <button type="submit" class="btn btn-primary">Add Place</button>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection