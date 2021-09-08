<?php

namespace App\Http\Controllers\Panel\Blog\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Panel\Blog\Post\Post;
use App\Http\Requests\Panel\Blog\Post\StoreUpdateFormRequest;

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
        ## VERIFICA
        if ( !$this->repository->create( $request->validated() ) )
            return redirect()
                            ->back()
                            ->withError( 'Ops... Algo errado!' )
                            ->withInput();

        ## RETORNO
        return redirect()
                        ->route( 'post.index')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit( $uuid )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request,  $uuid )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy( $uuid )
    {
        //
    }

    public function search()
    {
        //
    }

} // PostController
