<?php

namespace App\Services;
use App\Models\Post;
use App\Models\User;


class PostService
{
    public function getPostForIndex()
    {
        return Post::with('user')->get();
    }

    public function getFormDependencies()
    {
        return User::select('id','name')->get();
    }

    public function store(array $data)
    {
                return Post::create($data);
    }
}
