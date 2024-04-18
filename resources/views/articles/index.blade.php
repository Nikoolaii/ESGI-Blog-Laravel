@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4 w-50">
                    <div class="card mb-4 shadow-sm bg-white">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->content }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('articles.show', $article->id) }}"
                                       class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                                <small class="text-muted text-right">{{ $article->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="pagination justify-content-center">
        {{ $articles->links('vendor.pagination.custom') }}
    </div>
@endsection
