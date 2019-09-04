<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreUpdateFormRequest;
use App\Models\Post;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->get();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFormRequest $request)
    {
        $data = $request->all();

        ## UPLOAD IMAGEM
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name           = kebab_case($request->title); ## NOME
            $extension      = $request->image->extension(); ## EXTENSÃO
            $nameImage      = "{$name}.$extension"; ## NOME + EXTENSÃO
            $data['image']  = $nameImage;
            
            $upload         = $request->image->storeAs('posts', $nameImage); ## UPLOAD

            ## VERIFICAÇÃO
            if (!$upload)
                return redirect()->back()->with('errors', ['Falha no upload']);
        }

        $post = $request->user()
                        ->posts()
                        ->create($data);

        return redirect()
                    ->route('posts.index')
                    ->withSuccess('Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->find($id);

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFormRequest $request, $id)
    {
        $post = $this->post->find($id);

        $post->update($request->all());

        return redirect()
                ->route('posts.index')
                ->withSuccess('Registro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
