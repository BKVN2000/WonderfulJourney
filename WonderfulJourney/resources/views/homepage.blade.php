@extends('layouts.template')

@section('main_container')
<div class="container mt-4">
    @foreach($categories as $category)
        <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="font-weight-bold">{{$category->name}}</h2>
        </div>
           
           @if(!isset($category->articles) || $category->articles->count() === 0)
                <div class="col-md-12">
                    <h2 class="font-weight-bold">There is no article in this category</h2>
                </div>       
            @else
                @foreach($category->articles as $article)
                    <div class="col-md-3 mr-1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$article->title}}</h5>
                                <p class="card-text">
                                    @if (strlen($article->description) > 40)
                                        {{substr($article->description,0,40)."..."}}
                                    @else
                                        {{$article->description}}
                                    @endif
                                </p>
                                <div class="card-body d-flex justify-content-center">
                                    <div class="mr-3">
                                        <a href="{{route('ShowArticleDetail',$article->id)}}" class="btn btn-primary">Detail</a>
                                    </div>
                                
                                    @if (Auth::check() && Auth::user()->role === 'Admin')
                                    <div>
                                        <form method="POST" action="{{route('DeleteArticle',$article->id)}}" enctype="multipart/form-data" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>    
                                    @endif
                                </div>       
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @endforeach
</div>
@endsection