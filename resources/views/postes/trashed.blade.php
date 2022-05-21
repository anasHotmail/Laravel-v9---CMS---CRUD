@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             <div class="card-header">{{ __('Trashed Postes') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif




                    @if ($postes->count()>0)

                        <table class="table">

                          <thead class="table-dark">
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Title</th>
                              <th scope="col">Photo</th>
                              <th scope="col">Created_at</th>
                              <th scope="col">Deleted_at</th>
                              <th scope="col">Restore</th>
                              <th scope="col">Force Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ( $postes as $post ) <!-- $postes commmes from model -->
                             <tr>
                                <th scope="row">1</th>
                                <td>{{$post->title}}</td>
                                <td><img src="{{$post->featured}}" alt="{{$post->title}}" class="img-thumbnail" width="100px" height="100px"></td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->deleted_at}}</td>
                                <td><a type="button" class="btn btn-warning" href="{{ route('postes.restore',['id'=>$post->id])}}">
                                    Restore</a></td>
                                <td><a type="button" class="btn btn-danger" href="{{ route('postes.hdelete',['id'=>$post->id])}}">
                                    <i class="far fa-trash-alt"></i></a></td>

                             </tr>
                            @endforeach
                        </table>
                    @else
                        <P> No Trashed Postes</P>
                    @endif











                </div>
            </div>
        </div>
    </div>
</div>
@endsection
