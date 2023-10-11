@extends('layouts.app')

@section('content')
    <div class="title-container-index">
        <div class="titolo-index">
            <h1>I MIEI PROGETTI</h1>
        </div>
        <div class="rotta-create ">
            <button class="new-project"><a href="{{ route('admin.projects.create') }}">Nuovo progetto</a></button>
        </div>

    </div>

    <div class="container-index">
        <div class="rotta-create ">
            <button class="new-project"><a href="{{ route('admin.projects.create') }}">Nuovo progetto</a></button>
        </div>
        @foreach ($projects as $project)
            <div class="card-wrapper-index">
                <div class="card-index">

                    <div class="img-container-index">
                        <img src="{{asset("/storage/" .$project->image ) }}" alt="">
                    </div>

                    <div class="series-index">
                        <h1>{{ $project->title }}</h1>
                        <p>{{ $project->description }}</p>
                        <a href="{{ $project->github_link }}"></a>
                    </div>
                    <div class="modifica">
                        <button>
                            <a href=" {{ route('admin.projects.show', $project->id) }} ">Dettagli</a>
                        </button>
                        <button>
                            <a href=" {{ route('admin.projects.edit', $project->id) }} ">Modifica</a>
                        </button>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="new-project">Elimina</button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach

    </div>
@endsection
