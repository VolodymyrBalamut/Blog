<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Session;
use Purifier;
use Image;
use Illuminate\Support\Facades\Log;
use Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create variabel and store all posts from database
        $posts = Post::orderBy('id','desc')->paginate(5);

        //return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request); - view request data
        //validate the data
        $this->validate($request,array(
            'title'        => 'required|max:255',
            'slug'         => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'  => 'required|integer',
            'body'         => 'required',
            'featured_image' => 'sometimes|image'
        ));

        //store data in database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);

        //save our image
        //Log::info($request->hasFile('featured_image'));
        if($request->hasFile('featured_image')){
           //Log::info("image save");
           $image = $request->file('featured_image');
           $filename = time() . '.' .  $image->getClientOriginalExtension();
           $location = public_path('images/'.$filename);
           Image::make($image)->resize(800,400)->save($location);

           $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash("success","The blog post was successfully save!");

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save as a var
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        //return the view
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
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
        //Validate the data
        $post = Post::find($id);
        if($request->input('slug') == $post->slug){
            $this->validate($request,array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'body' => 'required',
                'featured_image' => 'image'
            ));
        } else{
            $this->validate($request,array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id' => 'required|integer',
                'body' => 'required',
                'featured_image' => 'image'
            ));
        }
        //Save the data to the database
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->input('body'));

        if($request->hasFile('featured_image')){
            //add the new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' .  $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->save($location);

            $oldFileName = $post->image;
            //update the database
            $post->image = $filename;

            //delete the old photo
            Storage::delete($oldFileName);

        }
        $post->save();

        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }
        
        //set flash data with success message
        Session::flash("success","The blog post was successfully saved!");

        //redirect with flash data to posts.show
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();

        //set flash data with success message
        Session::flash("success","The blog post was successfully deleted!");

        //redirect with flash data to posts.index
        return redirect()->route('posts.index');
    }
}
