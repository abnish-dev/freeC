@extends('layouts.master')

  @section('content')

    <div class="container">

        <div class="row">
          <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Question</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('question.index') }}"> Back</a>
                </div>
          </div>
        </div>
   
        
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered">

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Question Name:</strong>
                        {{ $question->question_name }}
                    </div>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Question Description:</strong>
                        {{ $question->question_description }}
                    </div>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Image:</strong>
                        <img src="{{asset('uploads/questionaire/'.$question->image)}}" style="height:100px;width:100px;">
                    </div>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Start Date:</strong>
                        {{ $question->start_date }}
                    </div>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>End Date:</strong>
                        {{ $question->end_date }}
                    </div>
                  </div>
                </div>

              </table>
            </div>
          </div>
        </div>
    </div>
  @endsection


