<?php
namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $post = Posts::latest()->paginate(3);
        return view('post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('Post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'author' => 'required'

        ]);

        Posts::create($request->all());

        return redirect()->route('Post.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Posts $post
     * @return Application|Factory|View
     */
    public function show(Posts $post): View|Factory|Application
    {
        return view('Posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Posts $post
     * @return Application|Factory|View
     */
    public function edit(Posts $post): View|Factory|Application
    {
        return view('Posts.edit', compact('post'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Posts $post
     * @return RedirectResponse
     */
    public function update(Request $request, Posts $post): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'author' => 'required'
        ]);
        $post->update($request->all());

        return redirect()->route('Posts.index')
            ->with('success', 'Post updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param Posts $post
     * @return RedirectResponse
     */
    public function destroy(Posts $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('Posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
