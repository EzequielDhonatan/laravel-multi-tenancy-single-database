@csrf

<div class="form-group">
    <input class="form-control" type="text" name="title" id="title" value="{{ $post->title ?? old('title') }}" placeholder="Título">
</div>

<div class="form-group">
    <input type="file" class="form-control" name="image">
</div>

<div class="form-group">
    <textarea class="form-control" name="body" id="body" cols="30" rows="5" placeholder="Conteúdo">{{ $post->body ?? old('body') }}</textarea>
</div>

<div class="form-group">
    <button class="btn btn-outline-success" type="submit">Enviar</button>
    <a class="btn btn-outline-danger" href="{{ route('posts.index') }}">Cancelar</a>
</div>