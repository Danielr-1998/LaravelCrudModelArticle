@extends('layout')
  <script src="https://cdn.tailwindcss.com"></script>

@section('content')
<h1>{{ $article->title }}</h1>
<p>{{ $article->content }}</p>
<a href="{{ route('articles.index') }}">Back to list</a>
@endsection

