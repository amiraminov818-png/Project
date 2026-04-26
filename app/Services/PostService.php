<?php

namespace App\Services;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostService
{

    public function index()
    {
        return $posts = Post::latest()->paginate();

    }

    public function getFormDependencies()
    {
        return User::select('id','name')->get();
    }

    public function store(array $data, int $user_id)
    {
        return Post::create($data);
    }
    public function update(array $data, Post $post)
    {
       $post->update($data);
    }

    public function delete(Post $post){
        $post->delete();
    }
}
