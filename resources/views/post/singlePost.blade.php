@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Hosting</a></li>
                <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
                <li class="breadcrumb-item"><a href="/category/{{}}">Category name</a></li>
                <li class="breadcrumb-item active" aria-current="page">slug</li>
            </ol>
            </nav>
            
        </div>
    </div>
</div>
@endsection
