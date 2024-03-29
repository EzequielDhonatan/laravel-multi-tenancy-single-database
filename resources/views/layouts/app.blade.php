<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config( 'app.name', 'Laravel Multi Tenancy Single Database' ) }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />

        <!-- MDB -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" />

        @livewireStyles

    </head>

    <body class="font-sans antialiased">

        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">

            @livewire( 'navigation-menu' )

            <!-- Page Heading -->
            @if ( isset( $header ) )

                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>

            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

        </div> <!-- min-h-screen bg-gray-100 -->

        @stack( 'modals' )

        @livewireScripts

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

    </body> <!-- font-sans antialiased -->

</html> <!-- -->
