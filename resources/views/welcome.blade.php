@extends('layouts.app')

@section('content')
<div class="container">
    

    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-7">
    
        
            <div style="background-color:white;padding:18px;">
                <h3 class="alert alert-info">New posts</h3>
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
                        <p>{!!substr(strip_tags($post->body),0,150)!!}... <a style="color:#ef237f;text-decoration:none;" href="/{{$post->category->url}}/{{$post->slug}}"> <strong>Read more >></strong> </a></p>
                    </div>
                    </div>
                </div>
                <hr class="auto-fixed">
                </article>
                @endforeach
                <h4><a style="color:#ef237f;text-decoration:none;" href="/blog">see all blog posts >>></a></h4>
            </div>

            <div style="background-color:white;padding:18px;">
                <h3 class="alert alert-info">Popular posts</h3>
                @foreach($posts2 as $post)
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
                        <p>{!!substr($post->body,0,150)!!}... <a style="color:#ef237f;text-decoration:none;" href="/{{$post->category->url}}/{{$post->slug}}"> <strong>Read more >></strong> </a></p>
                    </div>
                    </div>
                </div>
                <hr class="auto-fixed">
                </article>
                @endforeach
                <h4><a style="color:#ef237f;text-decoration:none;" href="/blog">see all blog posts >>></a></h4>
            </div>
            </div>
        <div class="col-md-3"><div style="background-color:blue">sfdcdsv</div></div>
    </div>

</div>

@endsection
