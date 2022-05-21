@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             <div class="card-header">{{ __('Postes') }}</div>

                <div class="card-body col-md-12 ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif





                    <table class="table ">

                        <thead class="table-dark">
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Title</th>
                              <th scope="col">Catecory</th>
                              <th scope="col">Photo</th>
                              <th scope="col">Created_at</th>
                              <th scope="col">Updated_at</th>
                              <th scope="col">Edit</th>
                              <th scope="col">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ( $postes as $post ) <!-- $postes commmes from model -->
                             <tr>
                                <th scope="row">1</th>
                                <td>{{$post->title}}</td>

                                @foreach ( $categories as $category )
                                    @if ($category->id == $post->category_id )
                                    <td>{{$category->name}}</td>
                                    @endif
                                @endforeach

                                <td><img src="{{$post->featured}}" alt="{{$post->title}}" class="img-thumbnail" width="100px" height="100px"></td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->updated_at}}</td>
                                @if (Auth::id() == $post->user_id)
                                <td><a type="button" class="btn btn-warning" href="{{ route('postes.edit',['id'=>$post->id])}}">
                                    Edit</a></td>
                                @endif
                                @if (Auth::id() == $post->user_id)
                                <td><a type="button" class="btn btn-danger" href="{{ route('postes.delete',['id'=>$post->id])}}">
                                    <i class="far fa-trash-alt"></i></a></td>
                                @endif


                             </tr>
                            @endforeach
                    </table>









                </div>
            </div>
        </div>
    </div>
</div>
@endsection
