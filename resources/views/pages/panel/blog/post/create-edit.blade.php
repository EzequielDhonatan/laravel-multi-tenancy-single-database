<x-app-layout>

    <x-slot name="header">

        <div class="row">

            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="{{ route( 'dashboard' ) }}">
                                Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route( 'post.index' ) }}">
                                Blog
                            </a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Dados do post
                        </li>

                    </ol> <!-- breadcrumb -->

                </nav> <!-- breadcrumb -->

            </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

        </div> <!-- row -->

    </x-slot> <!-- -->

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <div class="row">

                        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                            @if ( isset( $post ) )

                            <form method="POST" action="{{ route( 'post.update', $post->uuid ) }}">

                                {!! method_field('PUT') !!}

                            @else

                            <form method="POST" action="{{ route( 'post.store' ) }}">

                            @endif

                                {{ csrf_field() }}

                                @include( 'pages.panel.blog.post._partials.tabs' )

                                <div class="mt-4">

                                    <div class="row">

                                        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                                            <div class="form-group">

                                                <button type="submit" class="btn btn-outline-success btn-rounded">
                                                    Salvar
                                                </button>

                                                <a class="btn btn-outline-danger btn-rounded" href="{{ route( 'post.index' ) }}">
                                                    Cancelar
                                                </a>

                                            </div> <!-- form-group -->

                                        </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

                                    </div> <!-- row -->

                                </div> <!-- mt-4 -->

                            </form> <!-- form -->

                        </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

                    </div> <!-- row -->

                </div> <!-- p-6 sm:px-20 bg-white border-b border-gray-200 -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</x-app-layout> <!-- -->
