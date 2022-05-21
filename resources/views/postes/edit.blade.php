@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Post')  }} --> {{$post->title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif





                    <!-- عرض أخطاء التحقق-->
                    @if(count($errors)>0)
                        <ul class="navbar-nav mr-auto">
                            @foreach ($errors->all() as $error)
                                <li class="alert alert-danger">
                                     {{$error}}
                                </li>
                            @endforeach

                        </ul>
                    @endif


                    <!-- عرض الفورم-->

                    <form action="{{ route('postes.update',['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="category" class="form-label"> Category </label>
                            <select class="form-select" name = "category_id">
                                @foreach ($categories as $category)
                                    @if ($category->id == $post->category_id)
                                     <option value="{{$category->id}}" selected>{{$category->name}}</option>

                                    @else
                                     <option value="{{$category->id}}" >{{$category->name}}</option>
                                    @endif

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                          <label for="title" class="form-label">Title </label>
                          <input type="text" class="form-control" name="title" value="{{$post->title}}" >
                        </div>

                        <div class="form-check">
                            @foreach ($tags as $tag)
                                <label class="form-check-label"  >
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}"

                                    @foreach ($post->tags as $ta)
                                        @if ($tag->id == $ta->id)
                                            checked
                                        @endif
                                    @endforeach
                                >  {{$tag->tag}}  </label><br>
                            @endforeach
                        </div><br>

                        <div class="form-group">
                            <label for="content">Description</label>
                            <textarea class="form-control" name="content" id="content" rows="8" cols="8"> {!!$post->content!!} </textarea>
                        </div>

                        <div class="form-group">
                            <label for="featured">Photo ملاحظة : لا تختار صورة جديدة في حال اردت المحافظة على القديمة</label>
                            <input type="file" class="form-control-file" name="featured" >
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>










                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
@endsection


@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js" defer></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote();
        });
    </script>
@endsection

