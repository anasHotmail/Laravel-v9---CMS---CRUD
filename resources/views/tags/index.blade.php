@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             <div class="card-header">{{ __('Tags') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif





                    <table class="table">

                        <thead class="table-dark">
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Tag</th>
                              <th scope="col">Edit</th>
                              <th scope="col">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ( $tags as $tag ) <!-- $categories commmes from model -->
                             <tr>
                                <th scope="row">1</th>
                                <td>{{$tag->tag}}</td>
                                <td><a type="button" class="btn btn-warning" href="{{ route('tags.edit',['id'=>$tag->id])}}">
                                    Edit</a></td>
                                <td><a type="button" class="btn btn-danger" href="{{ route('tags.delete',['id'=>$tag->id])}}">
                                    <i class="far fa-trash-alt"></i></a></td>

                             </tr>
                            @endforeach
                    </table>









                </div>
            </div>
        </div>
    </div>
</div>
@endsection
