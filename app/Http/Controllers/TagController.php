<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags',Tag::all());
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        // ----- تحقق -----------------
        $this->validate($request,[
            "tag"    => "required",

        ]);

        //----- تخزين بالداتا -----
        $tag = new Tag;
        $tag->tag = $request->tag ;
        $tag->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit')->with('tag',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag, $id)
    {
        //dd($request->all());

        // ----- تحقق -----------------
        $this->validate($request,[
            "tag"    => "required",

        ]);

        //----- تحديث بالداتا -----
        //$category = new Category; ------ لا داعي بسبب استنساخه في تعريف دالة التحديث وشكرا --
        $tag = Tag::find($id);
        $tag->tag = $request->tag ;
        $tag->save();
        return view ('tags.index')->with('tags',Tag::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return view ('tags.index')->with('tags',Tag::all());
    }
}
