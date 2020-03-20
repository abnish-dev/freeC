@include('layouts.header')




  <div class="container">
      <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                  <h2>Add New answer</h2>
              </div>
              <div class="col-md-12 text-right mb-3">
                  <a class="btn btn-primary" href="{{ route('answer.index') }}"> Back</a>
              </div>
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
         
      <form action="{{ route('answer.store') }}" method="POST">
          @csrf
        
           <div class="row">

              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Name:</strong>
                      <input type="text" class="form-control" name="name" placeholder="Enter the answer name">
                  </div>
              </div>
          
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Description:</strong>
                      <textarea class="form-control" name="description" placeholder="Describe your answer here"></textarea>
                  </div>
              </div>
              
              
                  <div class="form-group">
                      <strong>Correct Answer:</strong> &nbsp&nbsp&nbsp
                      
                      <input type="radio" name="correct_answer" value="answer 1"> option1 <br>
                      <input type="radio" name="correct_answer" value="answer 2"> option2 <br>
                      <input type="radio" name="correct_answer" value="answer 3"> option3 <br>
                      <input type="radio" name="correct_answer" value="answer 4"> option4 <br>
                      
                  </div>
              

              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </div>
         
      </form>
    </div>
  

