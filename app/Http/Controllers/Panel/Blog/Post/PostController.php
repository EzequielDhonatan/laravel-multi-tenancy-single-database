<?php

namespace App\Http\Controllers\Panel\Blog\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Panel\Blog\Post\Post;
use App\Http\Requests\Panel\Blog\Post\StoreUpdateFormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected $repository;

    public function __construct( Post $model )
    {
        $this->repository = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->repository->latest()->paginate();

        return view( 'pages.panel.blog.post.index', compact( 'posts' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'pages.panel.blog.post.create-edit' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreUpdateFormRequest $request )
    {
        if ( $request->hasFile( 'image' ) && $request->file( 'image' )->isValid() ) {
            $name               = Str::kebab( $request->title );
            $extension          = $request->image->extension();
            $nameImage          = "{$name}.$extension";
            $request[ 'image' ] = $nameImage;

            $upload = $request->image->storeAs( 'panel/blog/post', $nameImage );

            if ( !$upload )
                return redirect()
                                ->back()
                                ->withError( 'Ops... Falha no Upload!' )
                                ->withInput();
        }

        if ( !$request->user()->posts()->create( $request->validated() ) )
            return redirect()
                            ->back()
                            ->withError( 'Ops... Algo errado!' )
                            ->withInput();

        return redirect()
                        ->route( 'post.index' )
                        ->withSuccess( 'Eba... Cadastro realizado com sucesso!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show( $uuid )
    {
        if ( !$post = $this->repository->where( 'uuid', $uuid )->first() )
            return redirect()
                            ->back()
                            ->withError( 'Ops... Registro não encontrado!' );

        return view( 'pages.panel.blog.post.show', compact( 'post' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit( $uuid )
    {
        ## RECUPERA
        if ( !$post = $this->repository->where( 'uuid', $uuid )->first() )
            return redirect()
                            ->back()
                            ->withError( 'Ops... Registro não encontrado!' );

        return view( 'pages.panel.blog.post.create-edit', compact( 'post' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update( StoreUpdateFormRequest $request,  $uuid )
    {
        ## RECUPERA
        if (!$post = $this->repository->where( 'uuid', $uuid )->first() )
            return redirect()
                            ->back()
                            ->withError( 'Ops... Registro não encontrado!' );

        $data = $request->all();

        if ( $request->hasFile( 'image' ) && $request->file( 'image' )->isValid() ) {
            // Remove image if exists
            if ( $post->image ) {
                if ( Storage::exists( "posts/{$post->image}")  )
                    Storage::delete( "posts/{$post->image}" );
            }

            $name               = Str::kebab( $request->title );;
            $extension          = $request->image->extension();
            $nameImage          = "{$name}.$extension";
            $data[ 'image' ]    = $nameImage;

            $upload = $request->image->storeAs( 'panel/blog/post', $nameImage );

            if ( !$upload )
                return redirect()
                                ->back()
                                ->withError( 'Ops... Falha no Upload!' )
                                ->withInput();
        }

        ## VERIFICA
        if ( !$post->update( $request->validated() ) )
            return redirect()
                            ->back()
                            ->withError( 'Ops... Falha ao atualizar!' )
                            ->withInput();

        ## RETORNO
        return redirect()
                        ->route( 'post.index' )
                        ->withSuccess( 'Eba... Registro atualizado com sucesso!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy( $uuid )
    {
        ## RECUPERA
        if ( !$post = $this->repository->where( 'uuid', $uuid )->first() )
            return redirect()
                            ->back()
                            ->withError( 'Ops... Registro não encontrado!' );

        ## VERIFICA
        if ( !$post->delete() )
            return redirect()
                            ->back()
                            ->withError( 'Ops... Falha ao deletar!' );

        ## RETORNO
        return redirect()
                        ->route( 'post.index' )
                        ->withSuccess( 'Registro atualizado com sucesso!' );
    }

    public function search( Request $request )
    {
        $filters = $request->except( '_token' );

        $posts = $this->repository->search( $request->filter );

        return view( 'pages.panel.blog.post.index', compact( 'posts', 'filters' ) );
    }

} // PostController
