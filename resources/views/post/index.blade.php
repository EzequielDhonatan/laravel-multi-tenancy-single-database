@extends('layouts.app')

@section('content')

<h1>Posts</h1>

<a class="btn btn-outline-success" href="{{ route('posts.create') }}">Novo</a>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<hr>

@forelse ($posts as $post)

    <p>
        <a href="{{ route('posts.edit', $post->id) }}">
            <strong>Título: </strong>
            {{ $post->title }}
        </a>
    </p>

    <p>
        <a href="{{ route('posts.edit', $post->id) }}">
            <strong>Conteúdo: </strong>
            {{ $post->body }}
        </a>
    </p>

    <hr>
@empty
    <p>Nenhum registro encontrado!</p>
@endforelse
    
@endsection