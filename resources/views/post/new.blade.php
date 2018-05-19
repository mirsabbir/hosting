@extends('layouts.app')

@section('content')
<div class="container">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        
    var editor_config = {
    path_absolute : "/",
    selector: "textarea",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
    
    </script>


<div class=" ml-auto mr-auto text-center">
    <h2 style="color:blue;margin-bottom:20px;margin-top:55px;">Create a new Blog post</h2>
    </div>
    
    <form action="/new" method="post">
    @csrf
    <div class="form-row">
      

    <div class="form-row ml-auto mr-auto">
      <div class="form-group col-md-12 ">

      <div class="row"> 
        <div class="col">
          <div class="form-group">
            <h4> <strong> Select a category</strong></h4>
            <select class="form-control" >
              <option disabled selected hidden>Select one</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              
            </select>
          </div>
        </div>
        <div class="col">
          <h4> <strong>Enter an unique slug</strong> </h4>
          <input id="slug" v-model="slug" type="text" name="slug" class="form-control"  placeholder="Slug">
        </div>
      </div>  
      <h4> <strong>Title</strong> </h4>
        <input type="text" class="form-control"  placeholder="Title"> 
      </div>
      <h4><strong>Body</strong> </h4>
      <textarea name="body" id="" cols="30" rows="15"></textarea>
      <div class="form-group col-md-12 " style="margin-top:50px;">
        <button type="submit" class="btn btn-primary btn-block">Post a new article</button>
      </div>
    </div>
      
      
    </form>



    


    
</div>
<script>

  var checker = new Vue({
      el: '#slug',
      data: {
        slug: '',
      },
      watch:{
          slug: function(){
            axios.post('/api/slug',{
                slug: checker.slug,
                api_token: '{!! Auth::user()->api_token !!}'
            })
            .then(function (response) {
                if(response.data.can){
                    $('#slug').removeClass('alert-danger');
                    $('#slug').addClass('alert-success');
                } else {
                    $('#slug').removeClass('alert-success');
                    $('#slug').addClass('alert-danger');
                } 
                
            })
            .catch(function (error) {
                console.log(error);
            });
          }
      },


  });


</script>


@endsection
