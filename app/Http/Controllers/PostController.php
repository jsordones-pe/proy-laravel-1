<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('index', 'show');
    }
    //1 method use __invoke
    public function index()
    {
        //$posts = DB::table('posts')->get();
        $posts = Post::get();

        return view("posts.index",['posts'=>$posts]);
    }

    public function show(Post $post){
        return view("posts.show", ["post" => $post]);
    }

    public function create(){
        return view("posts.create", ["post" => new Post()]);//enviar una instancia vacía
    }

    public function store(SavePostRequest $request){  //Request $request
        /*
        $validated = $request->validate([
            "title" => "required|min:4",
            "body" => "required",
        ],[
            'title.required' => 'Debe llenar el :attribute'   //modificar solo para este campo
        ]);
        */
        /*
        $post = new Post();
        $post->title = $request->input("title");
        $post->body = $request->input("body");
        $post->save();
        */

        //Post::create($validated);
        Post::create($request->validated());
        //session()->flash('status', 'Post Created!');
        return to_route("posts.index")->with('status', 'Post created!');
        //return redirect()->route("posts.index");
    }

    public function edit(Post $post){
        return view("posts.edit", ['post' => $post]);
    }

    public function update(SavePostRequest $request, Post $post) {
        /*
        $validated = $request->validate([
            "title" => "required|min:4",
            "body" => "required",
        ]);
        */
        /*
        $post->title = $request->input("title");
        $post->body = $request->input("body");
        $post->save();
        */
        //$post->update(['title' => $request->input('title'), 'body' => $request->input('body')]);
        $post->update($request->validated());
        //session()->flash('status', 'Post updated!');
        return to_route("posts.show", $post)->with('status', 'Post updated!');
    }

    public function destroy(Post $post) {
        $post->delete();
        return to_route("posts.index")->with('status', 'Post deleted!');
    }
}
