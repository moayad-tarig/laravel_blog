<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


   
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::all();
        return view('Posts.index')->with('posts', $posts)->with('tags', $tags);
    }


    public function postsTrashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('Posts.trashed')->with('posts', $posts);
    }

   
    public function create()
    {
        $tag = Tag::all();
        return view('Posts.create')->with('tag', $tag);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'photo' => 'required|image',
            'tags' => 'required',
            
        ]);
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/Posts',$newPhoto);


        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'content' => trim($request->content),
            'photo' => 'uploads/Posts/'.$newPhoto,
        ]);

        $post->tag()->attach($request->tags);

        $post->save();
        return redirect(route('posts'));
    }

    
    public function show( $slug)
    {
       
        $post = Post::where('slug', $slug)->first();
        return view('Posts.show')->with('post', $post);
    }

   
    public function edit( $id)
    {
        $tags = Tag::all();
        $post = Post::find($id);
        return view('Posts.edit')->with('post', $post)->with('tags', $tags);
    }

  
    public function update(Request $request,  $id)
    {
        $post = Post::find($id);
        // $post = Post::where('id', $id)->first();

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/Posts'.$newPhoto);
            $post->$photo = 'uploads/Posts'.$newPhoto;
        };
        // dd($request->all());
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        $post->tag()->sync($request->tags); 
       
        return redirect(route('posts'));
    }

    public function destroy( $id)
    {
        $post = Post::find($id);
        $post->delete($id);
        return redirect()->back();
    }

    public function hdelete( $id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        
        $post->forceDelete();
        return redirect()->back();
    }


    public function restore( $id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->back();
    }

}
