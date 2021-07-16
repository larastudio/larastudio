<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $queries = ['search', 'page'];
        return Inertia::render('Articles/Index', [
            'articles' => Article::when($request->user()->hasRole('user'), function ($query) use ($request) {
                $query->where('user_id', $request->user()->id);
            })
                ->filter($request->only($queries))
                ->paginate(2)
                ->withQueryString(),
            'filters' => $request->all($queries),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Articles/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        $request->user()->posts()->create($request->only('title', 'body'));

        return redirect()->route('articles.index')->with('success', 'Article has been created');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return Inertia::render('Article/Edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        $article->update($request->only('title', 'body'));

        return back()->with('success', 'Article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return back()->with('success', 'Article has been removed');
    }
}
