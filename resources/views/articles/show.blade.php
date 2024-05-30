@extends('layouts.app')

@section('content')
    <h1>{{ $article->title }}</h1>
    <img src="{{ $article->image_url }}" alt="{{ $article->title }}" style="width: 600px; height: auto;">
    <p>{{ $article->content }}</p>
    <a href="{{ route('home') }}">Back to Home</a>
@endsection
