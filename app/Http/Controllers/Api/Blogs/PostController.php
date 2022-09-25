<?php

namespace App\Http\Controllers\Api\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog\Post;
//use App\Models\Blog\PostTag;
use App\Models\Blog\Comment;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index()
    {
        return response()->json([
            'blogs' => Post::with(['likes', 'author', 'category', 'approved'])->withCount('comments', 'likes')
            ->latest()->paginate(12),
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            //'topic' => 'required|string|max:200',
            'category_id' => 'required|integer',
            'content'   => 'required|string',
        ]);

        $image = null;
        $type = null;

        $image = $this->saveImage($image, 'posts', 'png');

        $post = Post::create([
            'topic' => $request->input('topic') ?? 'Test Topic', 
            'image' => $image, 
            'content' => $request->input('content'), 
            'user_id' => auth('api')->id(), 
            'category_id' => $request->input('category_id'), 
            'status' => 0, 
            'approved_by' => null, 
            'published_date' => null, 
        ]);
        
        /*foreach ($request->input('tags') as $tag){
            PostTag::create([
                'post_id' => $post->id, 
                'tag_id'  => $tag,
                'course_id' => $request->input('course_id'), 'status'=> 1,'assigned_date' => date('Y-m-d'), 'start_date' => $request->input('end_date'),  'expiry_date' => $request->input('end_date'), ]
            );
        }*/

        return response()->json([
            'blogs' => Post::with(['author', 'category', 'approved'])->withCount('comments', 'likes')->latest()->paginate(5),
        ], 200);
    }

    public function show($id)
    {
        $post = Post::find($id);

        if(!$post){return response(['message' => 'Post not found'], 403);}
        
        return response()->json([
            'blog' => Post::where('id', '=', $id)->with(['author', 'category', 'approved', 'comments.user'])->withCount('comments', 'likes')
            ->first(),
            'comments' => Comment::where('post_id', '=', $id)->with('user')->paginate(5),
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'topic' => 'required|string|max:200',
            'category_id' => 'required|integer',
            'content'   => 'required|string',
        ]);
        
        $image = null;
        
        $post = Post::find($id);

        if(!$post){return response(['message' => 'Post not found'], 403);}
        if($post->user_id != auth('api')->id()){return response(['message' => 'Permission denied'], 403);}

        $post->topic = $request->input('topic'); 
        $post->image = $image; 
        $post->content = $request->input('content'); 
        $post->user_id = auth('api')->id(); 
        $post->category_id = $request->input('category_id'); 
        $post->status = 0; 
        $post->approved_by = null; 
        $post->published_date = null;

        $post->save();
        
        return response()->json([
            'post'  => $post,
            'blogs' => Post::with(['author', 'category', 'approved'])->withCount('comments', 'likes')->latest()->paginate(5),
            'message' => 'Post Updated',
        ]);
    }

    public function destroy($id)
    {
        $image = null;
        
        $post = Post::find($id);

        if(!$post){return response(['message' => 'Post not found']);}
        if($post->user_id != auth('api')->id()){return response(['message' => 'Permission denied']);}
        
        $post->comments()->delete();
        $post->likes()->delete();
        $post->deleted_by = auth('api')->id();
        $post->deleted_at = date('Y-m-d H:i:s');
        $post->save();

        return response()->json([
            //'post'  => $post,
            'blogs' => Post::with(['author', 'category', 'approved'])->withCount('comments', 'likes')->latest()->paginate(5),
            'message' => 'Post Deleted',
        ]);

    }
}
