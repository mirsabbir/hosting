@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7" >
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Hosting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
            </nav>
            
            
            <div style="background-color:white;padding:18px;">
                @foreach($posts as $post)
                <article class="blog-article">
                <header class="blog-header">
                    <h2> <strong><a href="" style="text-decoration:none;color:black;"> {{$post->title}} </a></strong>  </h2>
                </header>
                <div class="post-info">
                    <span class="blog-post">Posted by</span> <time class="time-date">15<sup class="superscript">th</sup>April,2018</time>
                    <a href="#">Editorial Staff</a>
                </div>
                <div class="blog-media" style="margin-top:15px;">
                    <div class="media">
                    <img class="align-self-start mr-3" height=150 width=150 src="{{asset('images/uploads/'.$post->image)}}" alt="Generic placeholder image">
                    <div class="media-body">
                        <p>{!!substr($post->body,0,150)!!}... <a style="color:#ef237f;text-decoration:none;" href="/{{$post->category->url}}/{{$post->slug}}"> <strong>Read more >></strong> </a></p>
                    </div>
                    </div>
                </div>
                <hr class="auto-fixed">
                </article>
                @endforeach
                <div class="row">
                    <div class="col"></div>
                    <div class="col">{{$posts->links()}}</div>
                    <div class="col"></div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
