@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><strong>Hosting</strong> </a></li>
                <li class="breadcrumb-item"><a href="/blog"><strong>Blog</strong> </a></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>Search</strong> </li>
            </ol>
            </nav>
            
            @if(sizeof($posts)==0)
            <h5 class="alert alert-danger">No results found</h5>
            @endif
            <div style="background-color:white;padding:18px;">
                @foreach($posts as $post)
                <article class="blog-article">
                <header class="blog-header">
                    <h2> <strong><a href="" style="text-decoration:none;color:black;"> {{$post->title}} </a></strong>  </h2>
                </header>
                <div class="post-info">
                <time class="time-date">{{date('l jS \of F Y ', strtotime($post->created_at))}}</time>
                </div>
                <div class="blog-media" style="margin-top:15px;">
                    <div class="media">
                    <img class="align-self-start mr-3" height=150 width=150 src="{{asset('images/uploads/'.$post->image)}}" alt="Generic placeholder image">
                    <div class="media-body">
                        <p>{!! substr( strip_tags($post->body),0,150)!!}... <a style="color:#ef237f;text-decoration:none;" href="/{{$post->category->url}}/{{$post->slug}}"> <strong>Read more >></strong> </a></p>
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
        <div class="col-md-3"><div style="background-color:blue">sfdcdsv</div></div>
    </div>
</div>


@endsection
