@extends('layouts.app')

@section('content')

<h1>Cadastrar Post</h1>

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

<form class="form" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">

    @csrf

    <div class="row">

        <div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <input type="text" class="form-control" name="title" id="title" placeholder="Título">
        </div>

    </div> <!-- row -->

    <div class="row">

        <div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Conteúdo"></textarea>
        </div>

    </div> <!-- row -->

    <div class="row">

        <div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <input type="file" class="form-control" name="image" id="image" placeholder="Imagem">
        </div>

    </div> <!-- row -->

    <br>

    <div class="row">

        <div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <button class="btn btn-outline-success" type="submit">Salvar</button>
            <a class="btn btn-outline-danger" href="{{ route('posts.index') }}">Cancelar</a>
        </div>

    </div> <!-- row -->

</form> <!-- form -->

@endsection