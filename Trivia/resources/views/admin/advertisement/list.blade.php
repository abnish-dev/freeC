
@extends('layouts.master')

@section('content')

@if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
    @endif


  <div class="container">
    <div class="row"> 
      <div class="col-md-6">
        <h2>Advertisement Module </h2>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 text-right mb-3">
        <a href="{{route('advertise.create')}}" class="btn btn-primary"> Add new </a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="card" style="border:groove; margin:10px;">
          <div class="card-header"> Ads Listing</div>

          <div class="card-body">
            <table class="table table-bordered" id="table1">
              <thead class="thead thead-dark">

                <tr>
                  <th>Id</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>

              @foreach($adverts as $advert)
                <tbody>
                  <tr>
                    <td>{{ $advert->id }}</td>
                    <td>{{ $advert->title }}</td>
                    <td>{{ $advert->description }}</td>
                    <td>
                      <form method="POST" action="{{route('advertise.destroy', $advert->id)}}">
                        @csrf
                        <a href="{{route('advertise.edit', $advert->id)}}" class="btn btn-info">Edit</a>
                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Are you sure ?')" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>  
    </div>
  </div>
  <script>
    $.noConflict();
      jQuery(document).ready(function($){
        $('#table1').DataTable();
      });
  </script>
  @endsection