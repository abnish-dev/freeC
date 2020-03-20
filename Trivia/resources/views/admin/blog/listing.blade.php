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
          <h2> Trivia Blogs </h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 text-right mb-3">
          <a href="{{route('blog.create')}}" class="btn btn-primary" >Add new</a> 
        </div>
      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header"> Blogs List </div>
            <div class="card-body">
              <table class="table table-bordered" id="myTable">
                <thead class="thead-dark">
                  <tr>
                    <th>Id</th>
                    <th>Blog Title</th>
                    <!-- <th>Blog Image</th> -->
                    <th>Short Description</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>

                  @foreach($blogs as $blog)
                  <tr>
                    
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->short_description }}</td>
                    <td>
                        @if($blog->status=='1')
                        <button type="button" name="status" class="btn btn-info">
                         <div>active</div>
                        
                        @else
                        <button type="button" name="status" class="btn btn-danger">
                        <div>inactive</div>
                        @endif
                      </button> 
                    </td>
                    <td>
                      <form method="POST" action="{{route('blog.destroy',$blog->id)}}">
                        @csrf
                        <a href="{{route('blog.show',$blog->id)}}" class="btn btn-info">Show</a>
                        <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-success">Edit</a>
                        @csrf
                        @method('DELETE')
                      
                        <button type="submit" onclick="return confirm('Are you sure you want to delete ?')" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
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
            $('#myTable').DataTable();
      });
    </script>
@endsection
