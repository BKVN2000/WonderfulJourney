@extends('layouts.template')

@section('main_container')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('ShowPostArticleForm')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Create new blog</a>
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($articles->count() === 0)
                        <tr>
                            <td colspan="2" class="text-center"><h2>You don't have any post yet</h2></td>
                        </tr>
                    @else
                        @foreach($articles as $article)
                            <a href="{{route('ShowArticleDetail',$article->id)}}" style="text-decoration: none;">
                                <tr>
                                    <td>{{$article->title}}</td>
                                    <td>
                                        <form method="POST" action="{{route('DeleteArticle',$article->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </a>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection