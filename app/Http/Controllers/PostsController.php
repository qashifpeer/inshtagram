<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Image;




class PostsController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');

    // }



    public function index()
    {

       $users= auth()->user()->following()->pluck('profiles.user_id');

       $posts=Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

      
       return view ('posts.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=$request->validate([
          'caption'=>'required',
          'image'=>'required|image'
    ]);

    $image_path=request('image')->store('uploads','public');
    $image= Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
    $image->save();

    Auth::user()->posts()->create([
        'caption'=>$data['caption'],
        'image'=>$image_path,
    ]);
    return redirect('/profile/'. Auth::user()->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //dd($post);
      //  $user= User::findOrFail($user);

         return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
