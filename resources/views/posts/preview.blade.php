@extends('layouts.app')

@section('content')
    <div class="container" style="width:50%">
        <div class="row">
            <div class="col-sm-8">
                <label>
                    <h1>Preview Post</h1>
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
                        <label type="text">Title: {{$post->title}}</label>
                    </div>
                    <div class="form-group">
                        @if(Auth::user()['admin'] == 1)
                            <form method="POST" action="{{ url('updatePost/'.$post->id.'/')}}">
                                {{ csrf_field() }}
                                <textarea id="update" rows="10" type="text" name="content"
                                          class="form-control">{{$post->content}}</textarea>
                                <button id="update" type="submit" class="btn btn-primary">Update</button>
                            </form>
                        @else
                            <textarea rows="10" type="text" name="content" class="form-control"
                                      readonly>{{$post->content}}</textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        Author: {{$post->author}}, {{date_format($post->created_at, 'H:i:s d.m.Y')}}
                    </div>
                    <div class="text-right">
                        <a href="{{url('posts')}}">
                            <button class="btn btn-primary">Back</button>
                        </a>
                        @if(Auth::user()['admin'] == 1)
                            <a href="{{url('deletePost/'. $post->id.'/')}}">
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </a>
                            @if($post->status ==0)
                                <a href="{{url('approvePost/'. $post->id.'/')}}">
                                    <button type="submit" class="btn btn-primary">Approve</button>
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
