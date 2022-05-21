@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif





                    <table class="table ">

                        <thead class="table-dark ">
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Photo</th>
                              <th scope="col">Name</th>
                              <th scope="col">E.Mail</th>
                              <th scope="col">Created_at</th>
                              <th scope="col">Updated_at</th>
                              <th scope="col">Role</th>
                              <th scope="col">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ( $users as $user ) <!-- $users commmes from model -->
                             <tr>
                                <th scope="row">1</th>

                                <td>
                                    @foreach ($profiles as $profile)
                                    @if ($profile->user_id == $user->id)
                                    <img src="{{ $profile->avatar }}" alt="{{ $profile->title }}"  class="img-thumbnail" width="60px" height="60px">
                                    @endif
                                    @endforeach
                                </td>

                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>

                                <td>
                                    @if ($user->admin)
                                            <a type="button" class="btn btn-danger"
                                                href="{{ route('users.notadmin', ['id' => $user->id]) }}">
                                                delete admin
                                            </a>
                                    @else
                                            <a type="button" class="btn btn-success"
                                                href="{{ route('users.admin', ['id' => $user->id]) }}">
                                                make admin
                                            </a>
                                     @endif
                                </td>


                                <td>
                                    @if (Auth::id() !== $user->id)
                                        <a type="button" class="btn btn-danger"
                                            href="{{ route('users.delete', ['id' => $user->id]) }}">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    @endif
                                </td>

                             </tr>
                            @endforeach
                    </table>









                </div>
            </div>
        </div>
    </div>
</div>
@endsection
