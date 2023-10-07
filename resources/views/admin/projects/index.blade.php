@extends("layouts.app")

@section("content")
    <h1>lista progetti</h1>
    <div class="rotta-create ">
        <a href="{{route("admin.projects.create")}}">Nuovo progetto</a>
    </div>
    <div class="container-dc">    
        <div class="card-wrapper">
            @foreach ( $projects as $project)
            <div class="card">
                
                <div class="img-container">
                    <img src="{{$project->image}}" alt="">
                </div>
                
                <div class="series">
                    <h1>{{$project->title}}</h1>
                    <p>{{$project->description}}</p>
                    <a href="{{$project->github_link}}"></a>
                </div>
                <div class="modifica">
                    <a href=" {{ route('admin.projects.show',$project->id) }} ">Dettagli</a>
                </div>
               
            </div>
            @endforeach
        </div>
    </div>

@endsection