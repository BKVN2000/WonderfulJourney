@extends('layouts.template')

@section('main_container')
<div class="container mt-4">
    @foreach($categories as $category)
        <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="font-weight-bold">{{$category->category_name}}</h2>
        </div>
           
           @empty($category->articles)
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
                                    @if (strlen($article->description) > 10)
                                        {{str_replace(substr($article->description,10),"....",$article->description)}}
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
            @endempty
        </div>
    @endforeach
</div>
@endsection