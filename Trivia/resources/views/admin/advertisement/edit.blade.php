@extends('layouts.master')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-12 margin-tb">
        <h2>Edit Page</h2>
      </div>
    </div>

    <div class=row>
      <div class="col-md-12 text-right mb-3">
        <a href="{{route('advertise.index')}}" class="btn btn-primary">Back</a>
      </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
      <div class="col-xs-12 col-xm-12 col-md-12">
        <div class="card">
          <div class="card-header"><h3> Edit </h3></div>
          
          <div class="card-body">

            <form method="POST" action="{{ route('advertise.update',$advert->id) }}"> 
              @csrf
              @method('PUT')

              <div class="col-xs-12 col-md-12 col-md-12">            
                <div class="form-group">  
                  <label> Title</label>
                  <input type="text" name="title" value="{{ $advert->title }}" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-12 col-xm-12 col-md-12">
                  <label> Description</label>
                  <textarea name="description" class="form-control">{{ $advert->description }}</textarea>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-xs-12 col-xm-12 col-md-12">
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection