<?php

namespace App\Http\Controllers;

use App\Services\Contracts\PostServiceInterface;
use Illuminate\Http\Request;
use App\models\Post;

class PostController extends Controller
{
    /** @var PostServiceInterface  */
    public $postService;

    /**
     * PostController constructor.
     * @param PostServiceInterface $postService
     */
    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = Post::all();

        return view('post.index')
            ->with(['posts'=> $posts]);
    }

    public function get(Post $post)
    {
        return view('post.get')
            ->with(['post'=> $post]);
    }

    public function popular(?$limit)
    {
        $posts = $this->postService->getPopular($limit);

        return view ('post.popular')->with(['posts'=> $posts]);
    }

    public function like(Post $post)
    {   
        $post = $this->postService->like($post);

        return view ('post.get')->with(['post'=> $post]);
    }
}
