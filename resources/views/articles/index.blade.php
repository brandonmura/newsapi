@extends('layouts.app')

@section('content')
    <div class="articles-container">
        @foreach ($articles as $article)
            <div class="article" style="background-image: url('{{ $article->image_url }}');">
                <div class="article-content">
                    <h2>{{ $article->title }}</h2>
                    <p>{{ Str::limit($article->body, 150) }}</p>
                    <a href="{{ route('articles.show', $article->id) }}" class="read-more">Read More</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="navbar pagination-container">
        {{ $articles->links() }}
    </div>
@endsection
