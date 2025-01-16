<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\post;

class PostController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required|string',
            'tags' => 'required|array',
            'content' => 'required|string',
            'category_id' => 'required'

        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName() . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/assets/images/posts/'), $imageName);
        }


        $post=Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
            'user_id' => Auth()->id() ,
            'category_id' => intval($request->category_id), 
        ]);

        if ($request->tags != NULL) {
        foreach ($request->tags as $tagId) {
            $post->tags()->attach($tagId);
        }
    }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments=Comment::with('post')->get();
        return view('posts.show', compact('post' , 'comments'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('ownerPost', $post);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post' , 'categories' , 'tags' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('ownerPost', $post);
        
        $request->validate([
            'image' => 'required', //cant send except you send a picture
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = public_path('/assets/images/posts/' . $post->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $imageName = $request->file('image')->getClientOriginalName() . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/assets/images/posts/'), $imageName);
        } else {
            $imageName = $post->image;
        }
        
        foreach ($post->tags as $tagId) {
            $post->tags()->detach($tagId);
        }
        
        $post->update([
            'image' => $imageName,
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth()->id() ,
            'category_id' => intval($request->category_id),
        ]);
        if ($request->tags != NULL) {
            foreach ($request->tags as $tagId) {
                $post->tags()->attach($tagId);
            }
        }

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('ownerPost', $post);
        $imagePath = public_path('/assets/images/posts/' . $post->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}
