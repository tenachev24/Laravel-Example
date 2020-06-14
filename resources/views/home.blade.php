@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Create Posts</h2>
                            </div>
                            <div class="col-sm-4 text-right">
                                @if(!auth()->guest())
                                    <a href="{{ url('post/new')}}" class="btn btn-primary">Create new</a>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>View Posts</h2>
                            </div>
                            <div class="col-sm-4 text-right">
                                @if(!auth()->guest())
                                    <a href="{{ url('posts')}}" class="btn btn-primary">View all</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
