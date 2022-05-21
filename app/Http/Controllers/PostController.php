<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('postes.index')->with('postes',Post::all())->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        if ($categories->count() ==0   ) {

            return redirect()->route('categories.create') ;

        }


        $tags = Tag::all();
        if ($tags->count() ==0 ) {

            return redirect()->route('tags.create') ;

        }


        return view('postes.create')->with('categories',$categories)
        ->with('tags',$tags);
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

        $this->validate($request,[
            "title"        => "required",
            "Description"  => "required",
            "Photo"        => "required|image",
            "category_id"  => "required",
            "tags"         => "required"
        ]);

        // ربط اسم الصورة بالوقت منعا للتشابه
        $featured = $request->Photo;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        // -- الطريقة الأولى للتخزين في الداتا
      /*$post = Post::create([
            "title"        => $request->title,
            "content"      => $request->Description,
            "category_id"  => $request->category_id,
            "featured"     => 'uploads/posts/' . $featured_new_name,

        ]);   */

        // -- الطريقة الثانية للتخزين في الداتا
        $post = new Post;
        $post->title       = $request->title ;
        $post->content     = $request->Description ;
        $post->category_id = $request->category_id ;
        $post->featured    = 'uploads/posts/'.$featured_new_name ;
        $post->slug        = Str::slug($request->title) ; // my new post => my-new-post
        $post->user_id     = Auth::id();
        $post->save();

        $post->tags()->attach($request->tags); // بالترتيب من اليسار المودل بوست بداخله تابع تاكز الذي يحمل عن طريق التابع اتاتش معرف كل بوست عن طريق الريكويست و المصفوفة تاكز المعرفة بأسماء التاك بالبليد يمكنك الوقوف كل  واحدة لتعرف ما هي
        return redirect()->back();


        //dd($request->all());



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('postes.edit')->with('post',Post::find($id))->with('categories',Category::all())
        ->with('tags',Tag::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $post = Post::find($id);

        $this->validate($request,[
            "title"        => "required",
            "content"      => "required",
            //"featured"     => "required|image"
            "tags"         => "required"

        ]);


        if ( $request->hasFile('featured')  ) {
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts/',$featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;

        }

       // dd($post);
        $post->title       =  $request->title;
        $post->content     =  $request->content;
        $post->category_id =  $request->category_id;
        $post->slug        = Str::slug($request->title) ; // my new post => my-new-post
        $post->user_id     = Auth::id();
        $post->save();

        $post->tags()->sync($request->tags);

        return redirect()->route('postes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }




    public function trashed()
    {
       $post = Post::onlyTrashed()->get();
       //dd($post);
       return view('postes.trashed')->with('postes',$post);

    }


    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->back();
    }

    public function hdelete( Request $request , $id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();

        /*if ( $request->hasFile('featured')  ) {
            $featured = $request->featured;
            $featured_will_delet = $featured->getClientOriginalName();
        }

        $featured = $request->featured;*/
        $post->forceDelete();
        //$featured->delete('uploads/posts/',$featured_will_delet);
        return redirect()->back();
    }






}
