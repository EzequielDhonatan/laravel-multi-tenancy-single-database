@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Posts</h1>

    <hr>

    @forelse ($posts as $post)
        <p><strong>Título: </strong>{{ $post->title }}</p>
        <p><strong>Conteúdo: </strong>{{ $post->body }}</p>

        <hr>
    @empty
        <p>Nenhum registro encontrado!</p>
    @endforelse

</div>

@endsection