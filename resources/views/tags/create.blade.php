@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             <div class="card-header">{{ __('Create Tags') }}</div>

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

                    <form action="{{ route('tags.store') }}" method="POST" >
                        @csrf
                        <div class="form-group">
                          <label for="title" class="form-label">Tag </label>
                          <input type="text" class="form-control" name="tag" placeholder="Enter Tag" >
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>










                </div>
            </div>
        </div>
    </div>
</div>
@endsection
