<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
   
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->with('tags',$tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        $tag = Tag::create([
            'name' => $request->name
        ]);
        $tag->save();
     
        
        return redirect(route('tags'));
    }

  
  

  
    public function edit(Tag $id)
    {
        $tag = Tag::find($id)->first();
        return view('tags.edit')->with('tag', $tag);
    }

    
    public function update(Request $request, Tag $id)
    {
        $tag = Tag::find($id)->first();
        $this->validate($request, [
            'name' => 'required',
        ]);
        $tag->name = $request->name;
        $tag->save();
        return redirect(route('tags'));
    }

   
    public function destroy(Tag $id)
    {
        $tag = Tag::find($id)->first();
        $tag->Delete();
        return redirect(route('tags'));
    }
}
