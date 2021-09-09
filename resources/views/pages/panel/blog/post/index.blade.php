<x-app-layout>

    <x-slot name="header">

        <div class="row">

            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="{{ route( 'dashboard' ) }}">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Posts
                        </li>

                    </ol> <!-- breadcrumb -->

                </nav> <!-- breadcrumb -->

            </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

        </div> <!-- row -->

    </x-slot> <!-- -->

    @include( 'pages.includes.alerts' ) <!-- Alerts -->
    @include( 'pages.includes.errors' ) <!-- Errors -->

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <div class="row">

                        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                            <h1 class="text-center">
                                Posts
                            </h1> <!-- -->

                            <div class="text-right">

                                <a class="btn btn-rounded btn-outline-black" href="{{  route( 'post.create' ) }}">
                                    Novo
                                </a>

                            </div> <!-- -->

                        </div> <!-- -->

                    </div> <!-- row -->

                    <div class="mt-4">

                        <div class="row">

                            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                                <div class="accordion" id="accordion">

                                    <div class="accordion-item">

                                        <h2 class="accordion-header" id="headingSearch">
                                            <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">
                                                Pesquisar
                                            </button>
                                        </h2>

                                        <div id="collapseSearch" class="accordion-collapse collapse" aria-labelledby="headingSearch" data-mdb-parent="#accordion">

                                            <form class="form" method="POST" action="{{ route( 'post.search' ) }}">

                                                {{ csrf_field() }}

                                                <div class="accordion-body">

                                                    <div class="row">

                                                        <div class="col-sm-6 col-xs-6 col-lg-6 col-md-6">

                                                            <div class="form-group">
                                                                <label for="name">Nome</label>
                                                                <input type="text" class="form-control" id="filter" name="filter" value="{{ $filters[ 'filter' ] ?? '' }}"/>
                                                            </div>

                                                        </div> <!-- -->

                                                    </div> <!-- row -->

                                                    <div class="mt-4">

                                                        <div class="row">

                                                            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fas fa-search"></i>
                                                                </button>

                                                            </div> <!-- -->

                                                        </div> <!-- row -->

                                                    </div> <!-- mt-4 -->

                                                </div> <!-- accordion-body -->

                                            </form> <!-- form -->

                                        </div> <!-- accordion-collapse collapse -->

                                    </div> <!-- accordion-item -->

                                </div> <!-- accordion -->

                            </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

                        </div> <!-- row -->

                    </div> <!-- mt-4 -->

                    <div class="mt-4">

                        <div class="row">

                            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                                <div class="table-responsive">

                                    <table class="table table-striped table-hover table-sm">

                                        <thead>

                                            <tr>

                                                <th scope="col" style="font-weight: bold;">#</th>
                                                <th scope="col" style="font-weight: bold;">Usuário</th>
                                                <th scope="col" style="font-weight: bold;">Título</th>
                                                <th scope="col" style="font-weight: bold;">Criado</th>
                                                <th scope="col" style="font-weight: bold;" width="150">Situação</th>
                                                <th width="100" style="font-weight: bold;"></th>

                                            </tr> <!-- -->

                                        </thead> <!-- -->

                                        <tbody>

                                        @forelse( $posts as $post )

                                            <tr>

                                                <td>
                                                    <a href="{{ route( 'post.edit', $post->uuid ) }}">
                                                        <img class="img-circle" style="max-width: 40px; margin: 10px;"  src="{{ url( 'assets/images/post/default.png' ) }}">
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{{ route( 'post.edit', $post->uuid ) }}">
                                                        {{ '@' . $post->user->name }}
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{{ route( 'post.edit', $post->uuid ) }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{{ route( 'post.edit', $post->uuid ) }}">
                                                        {{ $post->created_at->format( 'd/m/Y' ) }}
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{{ route( 'post.edit', $post->uuid ) }}">
                                                        @if ( $post->situation == 'A' )
                                                            <button type="button" class="btn btn-outline-success btn-sm px-3" title="Ativo">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        @else
                                                            <button type="button" class="btn btn-outline-danger btn-sm px-3" title="Inativo">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        @endif
                                                    </a>
                                                </td>

                                                <td>
                                                    <!-- Button trigger modal
                                                    ================================================== -->
                                                    <button type="button" class="btn btn-outline-danger" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                    <a class="btn btn-outline-primary fas fa-eye" href="{{ route( 'post.show', $post->uuid ) }}"></a>

                                                    <form method="POST" action="{{ route( 'post.destroy', $post->uuid ) }}" style="width: 150px;">

                                                        {{ csrf_field() }}
                                                        {!! method_field( 'DELETE' ) !!}

                                                        <!-- Modal
                                                        ================================================== -->
                                                        <div class="modal fade" id="staticBackdrop" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">

                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="staticBackdropLabel">Atenção!</h5>
                                                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                                    </div>

                                                                    <div class="text-center mt-4">
                                                                        <i class="fas fa-bell fa-4x text-danger mb-4"></i>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <h6 class="text-center">
                                                                            Tem certeza que deseja excluir este registro?
                                                                        </h6>
                                                                    </div>

                                                                    <div class="modal-footer">

                                                                        <button type="button" class="btn btn-outline-success btn-rounded" data-mdb-dismiss="modal">
                                                                            Não
                                                                        </button>

                                                                        <button type="submit" class="btn btn-outline-danger btn-rounded" title="Excluir">
                                                                            Sim
                                                                        </button>

                                                                    </div> <!-- modal-footer -->

                                                                </div> <!-- modal-content -->
                                                            </div> <!-- modal-dialog -->
                                                        </div> <!-- modal fade -->

                                                    </form> <!-- -->

                                                </td> <!-- -->

                                            </tr> <!-- -->

                                        @empty

                                            <tr>
                                                <td class="text-center" colspan="200">
                                                    Ops... Nenhum registro encontrado!
                                                </td>
                                            </tr>

                                        @endforelse

                                        </tbody> <!-- -->

                                    </table> <!-- table table-striped table-hover table-sm -->

                                </div> <!-- table-responsive S-->

                                <div class="card-footer">
                                    @if ( isset( $filters ) )
                                        {!! $posts->appends( $filters )->links() !!}
                                    @else
                                        {!! $posts->links() !!}
                                    @endif
                                </div>

                            </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

                        </div> <!-- row -->

                    </div> <!-- mt-4 -->

                </div> <!-- p-6 sm:px-20 bg-white border-b border-gray-200 -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</x-app-layout> <!-- -->
