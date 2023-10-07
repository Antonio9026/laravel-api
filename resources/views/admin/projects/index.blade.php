@extends("layouts.app")

@section("content")
    <h1>lista progetti</h1>
    <div class="container-dc">    
        <div class="card-wrapper">
            @foreach ( $projects as $project)
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
        </div>
    </div>
@endsection