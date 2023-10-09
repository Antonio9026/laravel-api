@extends('layouts.app')

@section('content')
   
    <div class="container-form">
        <form action="{{ route('admin.projects.store')}}" method="POST">
           
            @csrf()

            <label>Titolo:</label><br>
            <input type="text" name="title"><br>
            <label>Descrizione:</label><br>
            <textarea type="text" name="description"></textarea><br><br>
            <label>Immagine:</label><br>
            <input type="text" name="image"><br>
            <label>gitHub Link:</label><br>
            <input type="text" name="github_link"><br><br>
            <button>Salva</button>
            <a href="{{ route('admin.projects.index') }}"><button>Annulla</button></a>
        </form>
    </div>
@endsection