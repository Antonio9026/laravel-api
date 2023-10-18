@extends('layouts.app')

@section('content')
    <div class="routes">
        <a href="{{ route('admin.projects.index') }}"><button>torna indietro</button></a>
    </div>
    <div class="container-form">
        <form action="{{ route('admin.projects.update', $projects->id) }}" method="POST" enctype="multipart/form-data">

            @csrf()

            @method('put')
            <div class="mb-3">
                <label>Titolo:</label>
                <input class="@error('title') is-invalid @enderror" type="text" name="title"
                    value="{{ $projects->title }}"><br>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">

                <label>Descrizione:</label><br>
                <textarea class="@error('description')is-invalid @enderror" type="text" name="description">{{ $projects->description }}</textarea><br><br>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Immagine:</label><br>
                <input class="@error('image') is-invalid @enderror" type="file" accept="image/*" name="image"><br>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="create-label"></label>
                <select name="type_id">

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach

                </select>
            </div>
            <div class="container-technologies">
                @foreach ($technologies as $technology)
                    <div class="technology">
                        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                            {{ $projects->technologies?->contains($technology) ? 'checked' : '' }}>
                        <label>{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label>Github_link:</label><br>
                <input class="@error('github_link') is-invalid @enderror" type="text" name="github_link"
                    value="{{ $projects->github_link }}"><br><br>
                @error('github_link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>



            <button>Salva</button>
            <a href="{{ route('admin.projects.index') }}"><button>Annulla</button></a>
        </form>
    </div>
@endsection
