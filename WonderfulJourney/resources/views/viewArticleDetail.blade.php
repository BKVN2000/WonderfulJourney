@extends('layouts.template')

@section('main_container')
<div class="container mt-4">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4 text-uppercase font-weight-bold">{{$article->title}}</h1>
                <img src="{{$article->imageURL}}" class="img-fluid text-center" alt="Responsive image">
                <p class="text-justify">{{$article->description}}</p>
            </div>
            <a class="btn btn-primary" href="{{route('home')}}" role="button">Back</a>
        </div>
    </div>
</div>

@endsection