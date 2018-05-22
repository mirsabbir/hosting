@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                    @if(session('posted'))
                        <p class="alert alert-success">{{session('posted')}}</p>    
                    @endif
                <div class="card-body">
                <nav class="nav nav-pills flex-column flex-sm-row">
                  <a class="flex-sm-fill text-sm-center nav-link active" href="/new" style="margin-left:15px;margin-right:15px;">New post</a>
                  <a class="flex-sm-fill text-sm-center nav-link active" href="/home/category/edit" style="margin-left:15px;margin-right:15px;">Edit Categories</a>
                  <a class="flex-sm-fill text-sm-center nav-link active" href="/home/tag/edit" style="margin-left:15px;margin-right:15px;">Edit Tags</a>
                  
                </nav>
                    
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
