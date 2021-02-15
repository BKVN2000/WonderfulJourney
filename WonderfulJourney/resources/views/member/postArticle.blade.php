@extends('layouts.template')

@section('main_container')
<div class="container">
    <div class="row justify-center">
        <div class="col-md-8">
            <form method="POST" action="{{route('SubmitPostArticle')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="title" name="title">
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control" id="photo" placeholder="Another input" name="photo">
                </div>

                <div class="form-group">
                    <label for="description">Story</label>
                    <textarea class="form-control" id="description" placeholder="description" name="description" cols="40" rows="7"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>   
                        
            </form>
        </div>
    </div>
</div>
@endsection