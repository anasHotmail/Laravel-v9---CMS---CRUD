@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             <div class="card-header">{{ __('Create User') }}</div>

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

                    <form action="{{ route('users.store') }}" method="POST" >
                        @csrf
                        <div class="form-group">
                          <label for="title" class="form-label">Name </label>
                          <input type="text" class="form-control" name="name" placeholder="Enter Name" >
                        </div>

                        <div class="form-group">
                            <label for="title" class="form-label">E.mail </label>
                            <input type="text" class="form-control" name="email" placeholder="Enter E.mail" >
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password" >
                        </div>




                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>










                </div>
            </div>
        </div>
    </div>
</div>
@endsection
