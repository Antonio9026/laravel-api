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
                <input type="text" name="title" value="{{ $projects->title }}"><br>
            </div>
            <div class="mb-3">

                <label>Descrizione:</label><br>
                <textarea type="text" name="description">{{ $projects->description }}</textarea><br><br>
            </div>
            <div class="mb-3">
                <label>Immagine:</label><br>
                <input type="file" accept="image/*" name="image"><br>
                </label><br>
            </div>
            <label  class="create-label"><select name="type_id" >
 
                @foreach ($types as $type)
                
                <option value="{{$type->id}}">{{$type->type}}</option>
                @endforeach
                
            </select></label>
            <div class="mb-3">
                <label>Github_link:</label><br>
                <input type="text" name="github_link" value="{{ $projects->github_link }}"><br><br>
            </div>



            <button>Salva</button>
            <a href="{{ route('admin.projects.index') }}"><button>Annulla</button></a>
        </form>
    </div>
@endsection
