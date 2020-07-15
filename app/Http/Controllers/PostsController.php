<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class PostsController extends Controller
{
    public $timestamps = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $posts = Posts::get();
        return response()->json($posts);

    }

    public function getByDate(){
        $posts = Posts::orderBy('publication_date','desc')->get();
        return response()->json($posts);
    }

    public function myposts(){
        echo Auth::user()->posts;
        //echo "Hola";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // $request->merge(['user_id' => Auth::id()]);


        // Posts::create($request->only('title','description','user_id'));
        try{
            //$loggeduser= Auth::user();
            $user=User::find(1);
            $post = new Posts();
            $post->title = $request->input('title');
            $post->description = $request->input('description');
            $post->user_id=$request->input('user_id');
            $user->posts()->save($post);
            echo json_encode($post);

        }catch(Throwable $err){
            report($err);

         }

        // return "aqui andamos";
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\posts  $post_is
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$post_id)
    {
           $post=Posts::find($post_id);
           $post->title = $request->input('title');
           $post->description = $request->input('description');
           $post->save();
           echo json_encode($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        $post = Posts::find($post_id);
        $post->delete();
    }
}
