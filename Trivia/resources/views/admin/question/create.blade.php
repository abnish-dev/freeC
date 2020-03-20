@extends('layouts.master')


@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <div class="container">
      <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                  <h2>Add New question</h2>
              </div>
              <div class="col-md-12 text-right mb-3">
                  <a class="btn btn-primary" href="{{ route('question.index') }}"> Back</a>
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
         
      <form action="{{ route('question.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
        
          <div class="row">

              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Question Name:</strong>
                      <input type="text" class="form-control" name="question_name" placeholder="question name">
                  </div>
              </div>
          
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Question Description:</strong>
                      <textarea class="form-control" name="question_description" placeholder="Enter your question here"></textarea>
                  </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Image:</strong>
                      <input type="file" class="form-control" name="image" id="image">
                  </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Start Date:</strong>
                      <input type="date" name="start_date" class="form-control">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>End Date:</strong>
                      <input type="date" name="end_date" class="form-control">
                  </div>
              </div>
                 
              
              <div class="form-group">
                <strong>Status:</strong>    
                <label class="switch form-control">
                  <input type="checkbox" id="togBtn" name="status">
                  <div class="slider round"><span class="on">ON</span><span class="off">OFF</span></div>
                  </label>
              </div>
              <br>

              
            <div class="col-xs-12 col-sm-12 col-md-12">  
              <label>Add Answer Options</label>
                <div class="input_fields_wrap">
                  <div class='col-md-12 text-right mb-3'>
                      <span class="btn btn-primary add_field_button">Add More</span>
                  </div>
                  <div>
                    <div class='col-md-8'>
                      <div class="form-group">
                        <label>Option choice 1:</label>
                        <div class="input-group">
                          <input type="text" class="form-control" name="options[0][answer]">
                          <div class="input-group-addon">
                            <input type='radio' class='radio' name='options[0][radio]'/>
                          </div>
                          
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  
                </div>
              
            </div>

              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
         
      </form>
    </div>
  

    <script>
    
   //radio checked
        $('.radio').click(function()
        {

            // find all checked and cancel checked
            $('input:radio:checked').prop('checked', false);

            // this radio add cheked
            $(this).prop('checked', true);
        });

       ///add more options
        $(document).ready(function()
        {
          var max_value = 10; //maximum input boxes allowed
          var wrapper = $(".input_fields_wrap"); //Fields wrapper
          var add_button = $(".add_field_button"); //Add button ID
          var x = 1; //initlal text box count
          var y = 2;
          $(add_button).click(function(e)
          { //on add input button click
            e.preventDefault();
            if(x < max_value)
            { 

            $(wrapper).append("<div><div class='col-md-8'><div class='form-group'><label>Option choices "+ y +":</label><div class='input-group'><input type='text' class='form-control' name='options["+ x +"][answer]'><div class='input-group-addon'><input type='radio' class='radio' name='options["+ x +"][radio]' /></div></div><a href='#' class='remove_field'>Remove</a></div></div></div>"); //add input box
             x++; y++;
            }
          });
      
          $(wrapper).on("click",".remove_field", function(e)
          { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
          });
        });

    </script>

  @endsection 






