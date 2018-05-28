@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><strong>Hosting</strong> </a></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>Tags</strong></li>
            </ol>
            </nav>
            @foreach($tags as $tag)
            <span class="badge badge-primary"><a style="color:white;"href="/tags/{{$tag->id}}">{{$tag->name}}</a></span>
            @endforeach
        </div>
        <div class="col-md-3"><div style="background-color:blue">sfdcdsv</div></div>
    </div>
</div>
@endsection


