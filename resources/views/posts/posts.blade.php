@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ url('post/store') }}">
        {{ csrf_field() }}

        <div class="container" style="width:50%">
            <div class="row">
                <div class="col-sm-8">
                    <label>
                        <h1>Add Post</h1>
                    </label>
                    <div class="content">
                        @if(count($errors) > 0)
                            <ul class="list-group">
                                @foreach($errors->all() as $error)
                                    <li class="list-group-item text-danger">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Post Title">
                        </div>
                        <div class="form-group">
                        <textarea rows="10" type="text" name="content" class="form-control" placeholder="Post Content">
                        </textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" name="author" class="form-control" placeholder="Author">
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary">Publish</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
