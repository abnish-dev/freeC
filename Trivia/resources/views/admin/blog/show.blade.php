@extends('layouts.master')

@section('content')

    <div class="container">
      <div class="row">
          <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Blog</h2>
                </div>

                <div class="col-md-12 text-right mb-3">
                    <a class="btn btn-primary" href="{{ route('blog.index') }}"> Back</a>
                </div>
          </div>
      </div>

      <div class="card" style="border: groove;margin-bottom:40px; ">      
        <div class="card-body">
          <table class="table table-bordered">

            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  
                    <label>Blog Title</label>
                    <div class="form-control"> 
                      {{ $blog->title }}
                    </div>
                </div>

                <div class="form-group">
                  
                    <label>Short Description</label>
                    <div class="form-control"> 
                      {{ $blog->short_description }}
                    </div>
                </div>

                <div class="form-group">
                  
                    <label>Description</label>
                    <div class="form-control"> 
                      {{ $blog->description }}
                    </div>
                </div>

                <div class="form-group">
                  
                  <label>Status</label>
                  <div class="form-control">
                    @if($blog->status=='1')
                      
                       <div>Active</div>
                      
                      @else
                      
                      <div>Inactive</div>
                    @endif
                  </div>
                </div>

                 
                  <div class="form-group">
                    <label>Images</label>
                    @if(count($blogImages)> 0)
                      <div class="row_gallery_img" style="display:flex;flex-wrap: wrap;">
                        @foreach($blogImages as $image)
                          <div style="margin:5px; border: 1px solid grey;" >
                            <img src="{{asset('uploads/blogimage')}}/{{$image->image}}" style="height:100px; width:100px;">
                          </div>
                        @endforeach
                      </div>
                    @endif
                  </div>
                

              </div>
            </div>
          </table>
        </div> 
      </div>
        
      </div>
    </div>

  @endsection