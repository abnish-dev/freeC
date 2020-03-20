
@extends('layouts.master')

@section('content')
   
  <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">
  
 
  <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit question</h2>
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
  
    <form action="{{ route('question.update',$question->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Question Name:</strong>
                    <input type="text" class="form-control" name="question_name" 
                    value="{{ $question->question_name }}" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Question Description:</strong>
                    <textarea class="form-control" name="question_description">{{$question->question_description }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <img src="{{asset('uploads/questionaire/'.$question->image)}}" style="height:100px;width:100px;">
                    <input type="file" class="form-control" name="image" id ="image" value="{{$question->image}}" alt="">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Start Date:</strong>
                    <input type="date" name="start_date" value="{{ $question->start_date }}" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>End Date:</strong>
                    <input type="date" name="end_date" value="{{ $question->end_date }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <strong>Status:</strong>    
                <label class="switch form-control">
                  <input type="checkbox" id="togBtn" name="status" value="1" @if($question->status=='1') checked @endif>
                  <div class="slider round"><span class="on">ON</span><span class="off">OFF</span></div>
                </label>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">  
              <label>Add Answer Options</label>
                <div class="input_fields_wrap">
                  
                  <div class='col-md-12 text-right mb-3'>
                      <span class="btn btn-primary add_field_button">Add More</span>
                  </div>
                  
                  <div>
              
                    @foreach($options_detail as $option)
                    <div class='col-md-8'>
                      <div class="form-group">
                        <label>Option choices {{$i}} :</label>
                       
                        <div class="input-group">
                          
                          <input type="text" class="form-control" name="options[][answer]" value="{{$option->answers}}">
                          <div class="input-group-addon">
                            <input type='radio' class='radio' name='options[0][radio]'
                            value="{{$option->correct_answer}}" @if( $option->correct_answer === "1") checked @else @endif>
                            
                          </div>
                          
                        </div>
                       
                      </div>
                    </div>
                    <?php $i++; ?>
                    @endforeach
                  </div>
                  
                </div>
              
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
   
    </form>
  </div>

    <script>
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

          var x = <?php echo $c;?>;//initlal text box count
          var y = <?php echo $i;?>;
          $(add_button).click(function(e)
          { //on add input button click
            e.preventDefault();
            if(x < max_value)
            { //max input box allowed
             
            $(wrapper).append("<div><div class='col-md-8'><div class='form-group'><label>Option choices "+ y +":</label><div class='input-group'><input type='text' class='form-control' name='new_answer["+ x +"]'><div class='input-group-addon'><input type='radio' value='"+ x +"' class='radio' name='options["+ x +"][radio]' /></div></div><a href='#' class='remove_field'>Remove</a></div></div></div>"); //add input box

               x++; //text box increment
               y++;
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
