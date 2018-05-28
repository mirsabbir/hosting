@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-7">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><strong>Hosting</strong> </a></li>
                    <li class="breadcrumb-item"><a href="/blog"><strong>Blog</strong></a></li>
                    <li class="breadcrumb-item"><a href="/category/{{$cat->url}}"><strong>{{$cat->name}}</strong></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><strong>{{substr($post->slug,0,10)}}...</strong></li>
                </ol>
                </nav>
                
                @if(session()->has('commented'))
                <h5 class="alert alert-success">comment saved</h5>
                @endif

                @if($errors->any())
                <h5 class="alert alert-danger">{{$errors->first()}}</h5>
                @endif
                <div style="background-color:white;padding:18px;">
                    <h4>{{$post->title}}</h4>
                    <br>
                    {!! $post->body !!}
                </div>
                <h3>Comments</h3> <i class="far fa-comments fa-2x"></i>
                <div style="background-color:white;padding:18px;">
                    @foreach($post->comments as $comment)
                    <div style="margin-top:15px;">
                    <img style="border-radius:50%;" src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $comment->email ) ) )}}?d=mp&s=50" alt="">
                    <strong>{{$comment->name}}</strong>
                    <br>
                    {{$comment->body}}
                    <br>
                        @foreach($comment->replies as $reply)
                        <div style="background-color:white;padding:18px;margin-left:18px;">
                        <img style="border-radius:50%;"  src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $reply->email ) ) )}}?d=mp&s=50" alt="">
                            <strong>{{$reply->name}}</strong>
                            <br>
                            {{$reply->body}}
                            <br>
                        </div>
                        @endforeach
                    </div>
                    @endforeach

                    <!-- comment -->
                    <button style="margin-top:25px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">leave a comment</button>


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New comment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Name(required):</label>
                                    <input class="form-control" name="name" id="message-text" required></input>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Email(required):</label>
                                    <input class="form-control" name="email" id="message-text" required></input>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Comment(required):</label>
                                    <textarea class="form-control" name="comment" id="message-text" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" >Save comment</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                    
                </div>
                
                <h3>Tags</h3>
                    @foreach($post->tags as $tag)
                        <span class="badge badge-primary"><a style="color:white;"href="/tags/{{$tag->id}}">{{$tag->name}}</a></span>
                    @endforeach
            </div>
        <div class="col-md-3"><div style="background-color:blue">sfdcdsv</div></div>
    </div>

</div>
@endsection

