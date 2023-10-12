@extends('layouts.app')

@section('content')
    <div class="container-create">
        <form class="form-create" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">

            @csrf()

            <label class="create-label">Titolo:<input class="create-input" type="text" name="title"><br></label><br>

            <label class="create-label">Descrizione:
                <textarea class="create-input" type="text" name="description"></textarea><br><br>
            </label><br>

            <label class="create-label"><select name="type_id">

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach

                </select></label>
            <div class="container-technologies">
                @foreach ($technologies as $technology)
                    <div class="technology">
                        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}">
                        <label>{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>

            <label class="create-label">Immagine:
                <input class="create-input" accept="image/*" type="file" name="image"><br></label><br>
            <label class="create-label">gitHub Link: <input class="create-input" type="text"
                    name="github_link"><br><br></label><br>

            <button class="create-button">Salva</button>
            <button class="create-button"><a href="{{ route('admin.projects.index') }}"></a>Annulla</button>
        </form>
    </div>
@endsection
