  @extends('layouts.master')

  @section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">

    <div class="container">
      <div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Add New blog</h2>
          </div>
        </div>

        <div class="col-md-12 text-right mb-3">
          <a href="{{route('blog.index')}}" class="btn btn-primary">Back</a>
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
        
        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
         
          <div class="row">

            <div class="col-xs-12 col-xm-12 col-md-12">
              <div class="form-group">
                <label>Blog Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter the title">
              </div>
            </div>

            <div class="col-xs-12 col-xm-12 col-md-12"> 
              <div class="form-group">
                <label>Short Description</label>
                <input type="text" class="form-control" name="short_description" placeholder="Enter the short description">
              </div>
            </div>

            
            <div class="col-xs-12 col-xm-12 col-md-12">
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" placeholder="Write the blog here"></textarea>
              </div>
            </div>

            <div class="col-xs-12 col-xm-12 col-md-12">
              <div class="form-group">            
                <label>Image</label>
                <input type="file" class="form-control" name="image[]" id="image" multiple/>
              </div>
            </div>

              <div class="form-group">
                <label>Status</label>
                <label class="switch form-control">
                  <input type="checkbox" id="togBtn" name="status">
                  <div class="slider round"><span class="on">ON</span><span class="off">OFF</span></div>
                </label>
              </div>

              <div class="col-xs-12 col-xm-12 col-md-12">
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
              </div>

          <div>
        </form>
    </div>
  @endsection
  