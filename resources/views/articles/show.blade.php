@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 shadow-sm bg-white">
                    <div class="card-body">
                        <h3 class="card-title text-center">{{ $article->title }}</h3>
                        <h5 class="font-italic text-center">{{ $article->user->name}}</h5>
                        <p class="card-text">{{ $article->content }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('articles.index') }}"
                                   class="btn btn-sm btn-outline-secondary">Back</a>
                            </div>
                            <small class="text-muted
                            text-right">{{ $article->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
