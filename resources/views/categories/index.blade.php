@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             <div class="card-header">{{ __('Categories') }}</div>

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
                              <th scope="col">Catecory</th>
                              <th scope="col">Edit</th>
                              <th scope="col">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ( $categories as $category ) <!-- $categories commmes from model -->
                             <tr>
                                <th scope="row">1</th>
                                <td>{{$category->name}}</td>
                                <td><a type="button" class="btn btn-warning" href="{{ route('categories.edit',['id'=>$category->id])}}">
                                    Edit</a></td>
                                <td><a type="button" class="btn btn-danger" href="{{ route('categories.delete',['id'=>$category->id])}}">
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
