@extends("layouts.app")

@section("content")

<div class="card">
                
    <div class="img-container">
        <img src="{{$comic->image}}" alt="">
    </div>
    
    <div class="series">
        <h1>{{$comic->title}}</h1>
        <p>{{$comic->description}}</p>
        <a href="{{$comic->github_link}}"></a>
    </div>
    
    
</div>
    
@endsection