<?php

namespace App\Http\Controllers;
use App\Blog;
use App\BlogImages;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model; 
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs= Blog::all();
        return view('admin/blog/listing' , compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/blog/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'title'=>'required'
        ]);

        if($request->status){
          $status = 1;
        }else{
          $status = 0;
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->short_description= $request->short_description;
        $blog->description= $request->description;
        $blog->status=$status;
        $blog->save();


        if($request->hasfile('image'))
        {
          foreach($request->file('image') as $obj)
          {
            $file = $obj;
            $extension = $file->getClientOriginalExtension();

            $filename = time().uniqid().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/blogimage/' , $filename);
            $saveResult = BlogImages::create(['image'=>$filename, 'blog_id'=>$blog->id]); 
          }
          
        }

        else
        {
         // $blog->image = '';
        }
        
        return redirect()->route('blog.index')->with('success', 'blog created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog=Blog::find($id);
        $blogImages = BlogImages::where('blog_id',$id)->get();
        return view('admin/blog/show',compact('blog','blogImages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::where('id', $id)->first();
        $blogImages = BlogImages::where('blog_id',$id)->get();
      
        return view('admin/blog/edit')->with(compact('blog','blogImages'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'title'=>'required'
        ]);

        if($request->status){
          $status = 1;
        }else{
          $status = 0;
        }

        $blog = Blog::where('id',$id)->first();
        $blog->title = $request->title;
        $blog->short_description= $request->short_description;
        $blog->description= $request->description;
        $blog->status=$status;
        $blog->save();


        $blogImages = BlogImages::where('blog_id',$id)->get();
        if($request->hasfile('image'))
        {
          foreach($request->file('image') as $obj)
          {
            $file = $obj;
            $extension = $file->getClientOriginalExtension();
            $filename = time().uniqid().'.'. $file->getClientOriginalExtension();
            $file->move('uploads/blogimage/' , $filename);
            $saveResult = BlogImages::create(['image'=>$filename, 'blog_id'=>$blog->id]);
            
          }
        }
       
        return redirect()->route('blog.index')->with('success', 'blog updated successfully');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {      
       
        $blog = Blog::where('id', $id)->first();
        
        $blog->delete();
        return redirect()->route('blog.index')->with('success','Record has been been deleted');    
        
    }


    public function removeImage(Request $request){
      
        $response =array();
        $id = $request->id;
        $image = BlogImages::findOrFail($id);
       
        unlink(public_path('uploads/blogimage')."/".$image->toArray()['image']);

         $image->delete();
         $response['success'] = 'true';
         return $response;
    }

}
