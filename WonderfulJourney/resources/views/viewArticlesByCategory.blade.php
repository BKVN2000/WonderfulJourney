@extends('layouts.template')

@section('main_container')
<div class="container mt-4">
    <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="font-weight-bold">{{$category->name}}</h2>
        </div>
        
        @if($category->articles->count() === 0)
            <div class="col-md-12">
                <h2>There is no article in this category</h2>
            </div>       
        @else
            @foreach($category->articles as $article)
                <div class="col-md-3 mr-1">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">
                                @if (strlen($article->description) > 40)
                                    {{substr($article->description,0,40)."..."}}
                                @else
                                    {{$article->description}}
                                @endif
                            </p>
                            <a href="{{route('ShowArticleDetail',$article->id)}}" class="btn btn-primary">Detail</a>
                            @if (Auth::check() && Auth::user()->role === 'Admin')
                                <form method="POST" action="{{route('DeleteArticle',$article->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection