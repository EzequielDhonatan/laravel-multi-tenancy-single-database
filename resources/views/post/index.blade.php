@extends('layouts.app')

@section('content')

<h1>Posts</h1>

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
    <p><strong>Título: </strong>{{ $post->title }}</p>
    <p><strong>Conteúdo: </strong>{{ $post->body }}</p>

    <hr>
@empty
    <p>Nenhum registro encontrado!</p>
@endforelse
    
@endsection