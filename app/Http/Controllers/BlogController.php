<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tags;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::get();
        return view('admin.blog.list',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = Tags::get();
        return view('admin.blog.add',compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tag_name = explode(",",$request->tags);
        

        foreach($tag_name as $tag_value){

            $tag = Tags::where('tag_name','=',$tag_value)->first();
            if($tag == null){
                $tags = New Tags();
                $tags->tag_name = $tag_value;
                $add = $tags->save();                
            }
            //dd($tag);
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'short_description' => 'required',
            'long_desc' => 'required',
        ]);

        $blog = New Blog();
        $blog->title = $request->title;
        $blog->short_description = $request->short_description;
        $blog->tags = $request->tags;
        $blog->long_description = $request->long_desc;
        $add = $blog->save();

        return redirect('/')->with('status', 'Blog Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);        
        $tag = Tags::get();
        return view('admin.blog.show',compact('blog','tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $tag = Tags::get();

        $cate = [];
        foreach($tag as $cates){
            $cate[] = $cates->tag_name;
        }
        //dd($blog);
        return view('admin.blog.edit',compact('blog','tag','cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $tag_name = explode(",",$request->tags);
        

        foreach($tag_name as $tag_value){

            $tag = Tags::where('tag_name','=',$tag_value)->first();
            if($tag == null){
                $tags = New Tags();
                $tags->tag_name = $tag_value;
                $add = $tags->save();                
            }
            //dd($tag);
        }
        $validated = $request->validate([
            'title' => 'required|max:255',
            'short_description' => 'required',
            'long_desc' => 'required',
        ]);

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->short_description = $request->short_description;
        $blog->tags = $request->tags;
        $blog->long_description = $request->long_desc;
        $update = $blog->save();

        return redirect('/')->with('status', 'Blog updated Successfully !');
    }

    public function tag_add(Request $request){

        $tag = Tags::where('tag_name','=',$request->tag_name)->first();
        if($tag == null){
            $tags = New Tags();
            $tags->tag_name = $request->tag_name;
            $add = $tags->save();
            if($add == 1){
                echo 'yes';
            }else{
                echo 'no';
            }
        }else{
             echo 'no';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $delete = Blog::where('id', $_GET['id'])->delete();
        if($delete == 1){
            echo 1;
        }else{
            echo 2;
        }
        
    }
}
