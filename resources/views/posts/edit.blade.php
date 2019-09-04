@extends('layouts.app')

@section('content')

<h1>Editar Post</h1>

@include('includes.alerts')

<form class="form" method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">

    @method('PUT')
    @include('posts._partials.form')
    
</form> <!-- form --<

@endsection