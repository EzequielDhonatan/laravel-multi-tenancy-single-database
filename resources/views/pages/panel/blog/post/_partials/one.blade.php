<div class="mt-4">

    <div class="row">

        <div class="col-sm-9 col-xs-9 col-lg-9 col-md-9">

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error( 'name' ) is-invalid @enderror" id="name" name="name" value="{{ $post->name ?? old( 'name' ) }}">
                @error( 'name' )
                    <span style="color: red" class="error">{{ $message }}</span>
                @enderror
            </div>

        </div> <!-- -->

        <div class="col-sm-3 col-xs-3 col-lg-3 col-md-3">

            <div class="form-group">
                <label for="situation">Situação</label>
                <select class="form-control @error( 'situation' ) is-invalid @enderror" id="situation" name="situation">
                    <option value="A" @if( isset( $post ) && $post->situation == 'A' ) selected @endif>Ativo</option>
                    <option value="I" @if( isset( $post ) && $post->situation == 'I' ) selected @endif>Inativo</option>
                </select>
                @error( 'situation' )
                    <span style="color: red" class="error">{{ $message }}</span>
                @enderror
            </div>

        </div> <!-- -->

    </div> <!-- row -->

</div> <!-- mt-4 -->
