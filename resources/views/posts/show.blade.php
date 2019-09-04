@extends('layouts.app')

@section('content')

<h1>
    <strong>Título:</strong>
    {{ $post->title }}
</h1>

<p>
    <strong>Conteúdo</strong>
    {{ $post->body }}
</p>

<form class="form" method="POST" action="{{ route('posts.destroy', $post->id) }}">

    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-outline-danger">Deletar</button>

</form> <!-- form -->

@endsection