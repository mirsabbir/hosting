@extends('layouts.app')

@section('content')
<div class="container">
    
    


<div class=" ml-auto mr-auto text-center">
    <h2 style="color:blue;margin-bottom:20px;margin-top:55px;">Edit Category</h2>
    </div>
    
    <div class="col-md-6 ml-auto mr-auto">
    
   <ul class="list-group">
    
        @foreach($categories as $category)
        <form action="/home/category/edit" method="post" >
        @csrf
        <div class="row" style="margin-top:12px;margin-bottom:12px;">
          <span class="col">
          <li class="list-group-item">{{$category->name}}</li>
          </span>
          
        <span class="col">
        <input type="hidden" value="{{$category->id}}" name="delete">
        <input  type="submit" class="btn btn-danger" value="Delete Category">
        </span>
          </div>
          
          </form>
           
        @endforeach
    </ul>

    <form action="/home/category/edit" method="post" >
        @csrf
    <div class="row">
    <div class="col"><input type="text" class= "form-control" name="name" placeholder="name"></div>
    <div class="col"><input type="text" class= "form-control" name="url" placeholder="url"></div>
    <div class="col"><input type="submit" class="btn btn-primary" value="Add Category"></div>
    </form>
    
    
    </div>
    
    
      
    
    </div>
</div>



</script>


@endsection
