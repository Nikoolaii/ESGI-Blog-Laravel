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

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $article = Articles::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        return redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $article = Articles::find($id);
        $article->delete();

        return redirect()->route('articles.index');
    }
}
