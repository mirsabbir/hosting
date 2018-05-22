@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Hosting</a></li>
                <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
                <li class="breadcrumb-item"><a href="/category/{{$cat->url}}">{{$cat->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$post->slug}}</li>
            </ol>
            </nav>
            

            <div style="background-color:white;padding:18px;">
                {{$post->title}}
                <br>
                {!! $post->body !!}
            </div>
            <h3>Comments</h3> <i class="far fa-comments fa-2x"></i>
            <div style="background-color:white;padding:18px;">
                @foreach($post->comments as $comment)
                {{$comment->name}}
                <br>
                {{$comment->body}}
                    @foreach($comment->replies as $reply)
                    <div style="background-color:white;padding:18px;margin-left:15px;">
                        {{$reply->name}}
                        <br>
                        {{$reply->body}}
                    </div>
                    @endforeach
                @endforeach

                <h3>Tags</h3>
                @foreach($post->tags as $tag)
                    <a href="#">{{$tag->name}}</a>
                @endforeach
            </div>

            
        </div>
    </div>
</div>
@endsection
