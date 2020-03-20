@include('layouts.header')


<!-- this is answer listing page -->



  <div class="container">
      <div class="row">
        <h2> Trivia quiz app</h2>
      </div>

      <!-- <div class="row">
        <div class="col-md-12 text-left mb-3">
          <a href="{{url('admin/dashboard')}}" class="btn btn-primary">Back</a>
        </div>
      </div> -->
      
      <div class="row">
        <div class="col-md-12 text-right mb-3">
          <a href="{{route('answer.create')}}" class="btn btn-primary">Insert New </a>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

       </div>
    
      <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header"> <h5>Answer/List</h5></div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th> Id</th>
                    <th> Name</th>
                    <th> Description</th>
                    <th> Correct</th>

                    <th>Action</th>
                  </tr>
                </thead>
                @foreach ($answers as $answer)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $answer->name }}</td>
                    <td>{{ $answer->description }}</td>
                    <td>{{ $answer->correct_answer}}</td>
                   
                    <td>
                      <form action="{{ route('answer.destroy',$answer->id) }}" method="POST">
                  
                      @csrf

                      <a class="btn btn-info" href="{{route('answer.show',$answer->id) }}">Show</a>
      
                      <a class="btn btn-primary" href="{{ route('answer.edit',$answer->id) }}">Edit</a>
     
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






