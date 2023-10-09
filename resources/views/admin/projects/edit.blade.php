@extends('layouts.app')

@section('content')
   
    <div class="container-form">
        <form action="{{ route('admin.projects.update',$projects->id )}}" method="POST">
           
            @csrf()
           
            @method("put")
            <div class="mb-3">

            <label>Titolo:</label>
            <input type="text" name="title" value="{{$projects->title}}"><br>
            </div>
            <div class="mb-3">

            <label>Descrizione:</label><br>
            <textarea type="text" name="description">{{$projects->description}}</textarea><br><br>
            </div>
            <div class="mb-3">
            <label>Immagine:</label><br>
            <input type="text" name="image" value="{{$projects->image}}"><br>
            </div>
            <div class="mb-3">
            <label>Prezzo:</label><br>
            <input type="text" name="github_link" value="{{$projects->github_link}}"><br><br>
            </div>
           


            <button>Salva</button>
            <a href="{{ route('admin.projects.index') }}"><button>Annulla</button></a>
        </form>
    </div>
@endsection
