<?php

namespace App\Http\Controllers;

use App\Models\Articles;

class AdminController
{

    public function index()
    {
        $articles = Articles::all();
        return view('admin.home',
            [
                'title' => 'Admin',
                'articles' => $articles
            ]);
    }

}
