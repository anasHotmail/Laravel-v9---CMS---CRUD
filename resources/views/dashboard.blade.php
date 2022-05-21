@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif





                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                        <div class="card-header bg-primary">Posts</div>
                                        <div class="card-body bg-primary">
                                            <h5 class="card-title">{{ $post_count }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                        <div class="card-header bg-secondary">Users</div>
                                        <div class="card-body bg-secondary">
                                            <h5 class="card-title">{{ $users_count }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                        <div class="card-header bg-success">Categories</div>
                                        <div class="card-body bg-success">
                                            <h5 class="card-title">{{ $categories_count }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>







                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                        <div class="card-header bg-warning">Tags</div>
                                        <div class="card-body bg-warning">
                                            <h5 class="card-title">{{ $tags_count }}</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm">
                                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                                        <div class="card-header bg-light">Trashed Posts</div>
                                        <div class="card-body bg-light">
                                            <h5 class="card-title">{{ $trashed_count }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                        <div class="card-header bg-info">Header</div>
                                        <div class="card-body bg-info">
                                            <h5 class="card-title">Info card title</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>























                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
