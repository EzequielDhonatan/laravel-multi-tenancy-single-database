<x-app-layout>

    <x-slot name="header">

        <div class="row">

            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="{{ route( 'dashboard' ) }}">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route( 'post.index' ) }}">Blog</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Detalhes do post
                        </li>

                    </ol> <!-- breadcrumb -->

                </nav> <!-- breadcrumb -->

            </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

        </div> <!-- row -->

    </x-slot> <!-- -->

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">

                    <h4 class="text-center">Detalhes</h4>

                    <div class="mt-4">

                        <div class="row">

                            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                                <ul>

                                    <li>
                                        <strong>Nome:</strong> {{ $post->name }}
                                    </li>

                                    <li>
                                        <strong>Situação: </strong> {{ $post->situation == 'A' ? 'Ativo' : 'Inativo' }}
                                    </li>

                                </ul> <!-- -->

                            </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

                        </div> <!-- row -->

                    </div> <!-- mt-4 -->

                    <div class="mt-4">

                        <div class="row">

                            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                                <div class="form-group">
                                    <a class="btn btn-rounded btn-outline-primary" href="{{ route( 'post.index' ) }}">
                                        Voltar
                                    </a>
                                </div>

                            </div>

                        </div> <!-- row -->

                    </div> <!-- mt-4 -->

                </div> <!-- p-6 bg-white border-b border-gray-200 -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</x-app-layout> <!-- -->
