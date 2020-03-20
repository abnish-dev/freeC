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
          <h2> Trivia quiz app</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 text-right mb-3">
          <a href="{{route('question.create')}}" class="btn btn-primary">Insert New </a>
        </div>
      </div>
    
      <div class="row">
        <div class="col-md-12">
          <div class="card" style="border:groove;">
            <div class="card-header"><h5>Questions/List</h5></div>
            <div class="card-body">
              <table class="table table-bordered" id="setting">
                <thead class="thead-dark">
                  <tr>
                    <th> Id</th>
                    <th>Question Name</th>
                    <th>Question Description</th>
                    <th>Image</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                @foreach ($questions as $question)
                  <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->question_name }}</td>
                    <td>{{ $question->question_description }}</td>
                    <td>@if($question->image) <img src="{{asset('uploads/questionaire/'.$question->image)}}" style="height:100px;width:100px;">@endif</td>
                    <td>{{ $question->start_date }}</td>
                    <td>{{ $question->end_date }}</td>
                    
                    <td>
                        @if($question->status=='1')
                        
                          <div> Active</div>
                        @else
                          
                          <div>Inactive</div>
                        @endif
                    </td>
                    <td>
                      <form action="{{ route('question.destroy',$question->id) }}" method="POST">
                  
                        @csrf

                        <a class="btn btn-info" href="{{route('question.show',$question->id) }}">Show</a>
        
                        <a class="btn btn-primary" href="{{ route('question.edit',$question->id) }}">Edit</a>
       
                        @csrf
                        @method('DELETE')
          
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ?') ">Delete</button>

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
        $('#setting').DataTable();
      });
  </script>
@endsection
