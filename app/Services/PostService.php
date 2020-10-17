<?php
/**
 * Created by PhpStorm.
 * User: fly1nggremlin
 * Date: 17.10.20
 * Time: 14:18
 */

namespace App\Services;


use App\Models\Post;
use App\Services\Contracts\PostServiceInterface;
use Illuminate\Support\Collection;

class PostService implements PostServiceInterface
{
    /**
     * @param Post $post
     * @return Post
     */
    public function like(Post $post): Post
    {
        $post->like++;

        $post->save();
    }

    /**
     * @param $limit
     * @return Collection
     */
    public function getPopular(?$limit): Collection
    {
        $query = Post::query()->orderBy('like', 'desc');

        if ($limit) {
            $query->limit($limit);
        }

        return $query->get();
    }
}