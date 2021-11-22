<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPost = new Post;

        $newPost->fill($request->all());
        $newPost->slug = $this->slugChecker($request->title);
        $newPost->save();
        
        return redirect()->route('admin.posts.index', $newPost['id'])
            ->with('success', "post created succesfully (postID {{$newPost['id']}})");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post','categories'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        if($post->title != $request->title) {
            $post->slug = $this->slugChecker($request->title);
        }

        $post->fill($request->all());
        $post->save();

        return redirect()->route('admin.posts.index', $post['id'])
            ->with('success', "modified succesfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')
            ->with('success', "{$post['title']} has been successfully deleted");

    }

     /**
     * getSlug - return a unique slug
     *
     * @param  string $title
     * @return string
     */
    private function slugChecker($value)
    {
        $slug = Str::of($value)->slug('-');

        $postExist = Post::where("slug", $slug)->first();

        $c = 2;
        
        while($postExist) {
            $slug = Str::of($value)->slug('-') . "-{$c}";
            $postExist = Post::where("slug", $slug)->first();
            $c++;
        }

        return $slug;
    }
}


