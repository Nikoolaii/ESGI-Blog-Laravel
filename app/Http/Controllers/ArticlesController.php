<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Articles::paginate(4);
        return view('articles.index',
            [
                'articles' => $articles
            ]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'contentArticles' => 'required'
        ]);

        $article = new Articles();
        $article->title = $request->title;
        $article->content = $request->contentArticles;
        $article->user_id = auth()->user()->id;
        $article->slug = \Str::slug($request->title);
        $article->save();

        return redirect()->route('admin.index');
    }

    public function show($id)
    {
        $article = Articles::find($id);
        return view('articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Articles::find($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Articles $article)
    {
        $request->validate([
            'title' => 'required',
            'articleContent' => 'required'
        ]);

        $article->title = $request->title;
        $article->content = $request->articleContent;
        $article->save();

        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
        $article = Articles::find($id);
        $article->delete();

        return redirect()->route('admin.index');
    }
}
