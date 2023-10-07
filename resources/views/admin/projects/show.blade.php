@extends("layouts.app")

@section("content")

<div class="card">
                
    <div class="img-container">
        <img src="{{$project->image}}" alt="">
    </div>
    
    <div class="series">
        <h1>{{$project->title}}</h1>
        <p>{{$project->description}}</p>
        <a href="{{$project->github_link}}"></a>
    </div>

    
</div>
    
@endsection