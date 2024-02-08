<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth")->except("show");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "description" => "required",
            "image" => ["required", "mimes:jpg,jpeg,png,gif"]
        ]);

        $image = $request["image"]->store("posts", "public");
        $data["image"] = $image;
        $data["slug"] = Str::random(10);
        auth()->user()->posts()->create($data);
        return redirect()->route("show_post", ["post" => $data["slug"]]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $data = $request->validate([
            "description" => ["required"],
            "image" => ["nullable", "mimes:jpg,jpeg,png,gif"]
        ]);

        if ($request->has("image")) {
            $image = $request["image"]->store("posts", "public");
            $data["image"] = $image;
            Storage::delete("public/" . $post->image);
        }

        $post->update($data);
        return redirect()->route("show_post", ["post" => $post]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(!is_null($post))
        {
            Storage::delete("public/" . $post->image);
            $post->delete();
        }
        return redirect("/");

    }
}
