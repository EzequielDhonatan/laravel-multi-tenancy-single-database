<div class="messages">

    @if ( $errors->any() )

        <div class="alert alert-warning">
            <ul>

                @foreach ( $errors->all() as $error )

                    <strong>
                        <li>{{ $error }}</li>
                    </strong>

                @endforeach

            </ul> <!-- -->
        </div> <!-- -->

    @endif

</div> <!-- messages -->
