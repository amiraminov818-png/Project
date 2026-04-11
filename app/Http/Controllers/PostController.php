<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct(public readonly PostService $postService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = $this->postService->getPostForIndex();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = $this->postService->getFormDependencies();
        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'user_id' => 'required|integer|exists:users,id',
        ]);
        $this->postService->store($data);
        return redirect()->route('posts.index')->with('success', 'Post Created Successfully');
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
