@extends('layouts.app')

@section('content')
    <div class="container-create">
        <form class="form-create" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">

            @csrf()
            <div class="title">
                <label class="create-label">Titolo:</label><br>
                <input class="create-input @error('title') is-invalid @enderror" type="text" name="title"><br><br>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="description">

                <label class="create-label">Descrizione:</label><br>
                <textarea class="create-input  @error('description') is-invalid @enderror" type="text" name="description"></textarea><br><br>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="type">
                <label class="create-label"></label>
                <select name="type_id">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach

                </select>
            </div>
            <div class="technologies">
                @foreach ($technologies as $technology)
                    <div class="technology">
                        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}">
                        <label>{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>
            <div class="image">
                <label class="create-label">Immagine:</label><br>
                <input class="create-input @error('image') is-invalid @enderror" accept="image/*" type="file"
                    name="image"><br>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="git_hub">
                <label class="create-label">gitHub Link:</label><br>
                <input class="create-input @error('github_link') is-invalid @enderror"
                    type="text"name="github_link"><br><br>
                @error('github_link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="create-button">Salva</button>
            <button class="create-button"><a href="{{ route('admin.projects.index') }}"></a>Annulla</button>
        </form>
    </div>
@endsection
