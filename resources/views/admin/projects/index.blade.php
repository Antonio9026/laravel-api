@extends('layouts.app')

@section('content')
    <div class="title-container-index">
        <div class="titolo-index">
            <h1>I MIEI PROGETTI</h1>
        </div>
     
    </div>
    {{-- <div class="rotta-create ">
        <button class="new-project"><a href="{{ route('admin.projects.create') }}">Nuovo progetto</a></button>
    </div> --}}
    <div class="container-index">
        <div class="rotta-create ">
            <button class="new-project"><a href="{{ route('admin.projects.create') }}">Nuovo progetto</a></button>
        </div>
        @foreach ($projects as $project)
            <div class="card-wrapper-index">
                <div class="card-index">

                    <div class="img-container-index">
                        <img src="{{ $project->image }}" alt="">
                    </div>

                    <div class="series-index">
                        <h1>{{ $project->title }}</h1>
                        <p>{{ $project->description }}</p>
                        <a href="{{ $project->github_link }}"></a>
                    </div>
                    <div class="modifica">
                        <a href=" {{ route('admin.projects.show', $project->id) }} "><i
                                class="fa-solid fa-circle-info"></i></a>
                    </div>

                </div>
            </div>
        @endforeach
      
    </div>
@endsection
