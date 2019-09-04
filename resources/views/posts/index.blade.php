@extends('layouts.app')

@section('content')

<h1>Posts</h1>

<a class="btn btn-outline-success" href="{{ route('posts.create') }}">Novo</a>

@include('includes.alerts')

<hr>

@forelse ($posts as $post)

        <span class="text-muted pull-right">
            <small class="text-muted">Criado: {{ $post->created_at->format('d/m/Y') }}</small>
        </span>
        
        <a href="{{ route('posts.edit', $post->id) }}">
            <h4>
                <strong>Título: </strong>
                {{ $post->title }}
            </h4>
        </a>

        <a href="{{ route('posts.show', $post->id) }}">Detalhes</a>

    <hr>

@empty

    <p>Nenhum registro encontrado!</p>
    
@endforelse

{!! $posts->links() !!}

@endsection
