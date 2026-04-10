<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(public readonly ProjectService $projectService)
    {
    }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $project)
    {
        //
    }
}
