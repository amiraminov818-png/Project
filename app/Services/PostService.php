<?php

namespace App\Services;
use App\Models\Post;
use App\Models\User;


class PostService
{

    public function getPostForIndex()
    {
        return Post::forIndex()->with('user')->latest()->paginate(8);
    }

    public function getFormDependencies()
    {
        return User::select('id','name')->get();
    }

    public function store(array $data)
    {
        $data['user_id'] = auth()->id();

                return Post::create($data);
    }
}
