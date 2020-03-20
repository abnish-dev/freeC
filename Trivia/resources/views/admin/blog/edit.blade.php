@extends('layouts.master')

@section('content')


      <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">
      <style type="text/css" media="all">
        
            .contain {
              position: relative;
              /*width: 100%;*/
              max-width: 400px;
              margin: 5px 10px;
            }

            .contain img {
              width: 100px;
              height: 100px;
              margin: 2px;
              border: 1px solid black;
            }

            .contain .own-deletebtn {
              position: absolute;
              top: 4%;
              right:5%;
              -ms-transform: translate(-50%, -50%);
              color: red;
              font-size: 16px;
              cursor: pointer;
              /*margin-right: 83px;*/
            }

            .contain .bttn:hover {
              background-color: black;
            }

      </style>

  <div class="container">
      <div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Edit the Blogs</h2>
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
      
        
      <form method="POST" action="{{ route('blog.update',$blog->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="row">

            <div class="col-xs-12 col-xm-12 col-md-12">
              <div class="form-group">  
                <label>Blog Title</label>
                <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
              </div>
            </div>

            <div class="col-xs-12 col-xm-12 col-md-12">
              <div class="form-group">
                <label>Short Description</label>
                <input type="text" class="form-control" name="short_description" value="{{ $blog->short_description }}">
              </div>
            </div>

            <div class="col-xs-12 col-xm-12 col-md-12">
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $blog->description }}</textarea>
              </div>
            </div>

            <div class="col-xs-12 col-xm-12 col-md-12">  
              <div class="form-group">
                <div class="row">
                    <label>Select Multiple Image</label>
                    <input type="file" class="form-control" name="image[]" multiple/> 
                </div>
                </br>

                <div class="row">
                  <div class="col-xs-12 col-xm-12 col-md-12">
                    @if(count($blogImages)> 0)
                      <div class="row_gallery_img" style="display: flex;flex-wrap: wrap;">
                        @foreach($blogImages as $image)
                          <div class="contain">

                            <img src="{{asset('uploads/blogimage')}}/{{$image->image}}">
                            <i class="fas fa-trash-alt own-deletebtn" data-id="{{$image->id}}"></i>
                            <br>
                          </div>
                        @endforeach
                      </div>
                    @endif
                  </div>
                </div> 
              </div>
            </div>

            <div class="form-group">
                <label>Status</label>
                <label class="switch form-control">

                  <input type="checkbox" id="togBtn" name="status" value="1" @if($blog->status =='1') checked @endif><div class="slider round"><!--ADDED HTML --><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label>
            </div>


            <div class="col-xs-12 col-xm-12 col-md-12">
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
              </div>
            </div>

          </div>
        </form>

  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

      <script type="text/javascript">
          $('.own-deletebtn').on('click', function(e)
          {
              e.preventDefault();
              let id = $(this).attr('data-id');
              var _token = $('input[name="_token"]').val();

              let parentDiv = $(this).closest('div.row');

              bootbox.confirm("Are you sure you want to delete this?", function(result)
              {
                if(result)
                {
                    $.ajax({
                        url : "/blog/delete",
                        type : 'POST',
                        data : {id:id,_token:_token},
                        success : function(response)
                        {
                          //console.log(response);return false;
                            if(response){
                                $(this).parent().remove();
                            }
                        }.bind(this)
                    })
                }
              }.bind(this));
          });
      </script>
  
@endsection
