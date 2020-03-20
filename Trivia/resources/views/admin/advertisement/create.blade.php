@extends('layouts.master')

@section('content')

  <div class="container">
    <div class="row">
      <h2>Add Page</h2>
    </div>

    <div class=row>
      <div class="col-md-12 text-right mb-3">
        <a href="{{route('advertise.index')}}" class="btn btn-primary">Back</a>
      </div>
    </div>

    @if($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <div class="row">
      <div class="col-xs-12 col-xm-12 col-md-12">
        <div class="card">  
          <div class="card-header"><h3> add new </h3></div>

          <div class="card-body">

          <form method="POST" action="{{route('advertise.store')}}">  
            @csrf

            <div class="form-group">
              <div class="col-xs-12 col-xm-12 col-md-12">
                <label> Title</label>
                <input type="text" name="title" placeholder="Enter the title" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-12 col-xm-12 col-md-12">
                <label> Description</label>
                <textarea name="description" placeholder="Enter the description" class="form-control"></textarea>
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-xs-12 col-xm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              
            </div>
          </div>
          </form>
        </div>
        
    </div>
    
  </div>

  @endsection