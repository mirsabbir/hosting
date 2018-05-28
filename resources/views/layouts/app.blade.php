<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5aff06045f7cdf4f053457fe/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    

</head>
<body>
    <div id="search">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary " >
            <div  class="container" >
                <a class="navbar-brand" href="{{ url('/') }}">
                    <strong>{{ config('app.name', 'Laravel') }}</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                

                
                        
                     <div  class="mr-auto"style="margin-left:10px;">
                            <form class="form-inline ml-auto " action="/search" method="get">
                            @csrf
                            <div class="form-group">
                                <input  @blur="r()" v-model="q" style="width:300px" autocomplete="off" type="text" name="search" class="form-control" placeholder="search posts...">
                                <button style="margin-left:10px" type="submit" name="" id=""  value="search"class="btn btn-secondery ">Search</buton>
                            </div>
                            </form>
                        </div>
                
               
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <!-- <ul class="navbar-nav"> -->


                       

                    <!-- </ul> -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="/blog"><strong>Blog</strong> </a></li>
                    <li class="nav-item"><a class="nav-link active" href="/coupons"><strong>Coupons</strong> </a></li>
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>Categories</strong>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($categories as $category)
                            <a class="dropdown-item" href="/category/{{$category->url}}">{{$category->name}}</a>
                            @endforeach
                            </div>
                    </li>
                    
                        <!-- Authentication Links -->
                            
    
                        
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="row">
            <div class="col-md-2"></div>
            <div style="position:absolute;margin-left:8%;z-index:50;" class="col">

                <div class="col-md-6">
                
                <div class="list-group"id="res">
                    
                    
                    <div  v-for="(result,key) in results" >
                    <a  :href="links[key]" style="color:black;margin-left:12%;font-weight:bold" class="list-group-item list-group-item-action list-group-item-warning" >
                        @{{result.title}}
                    </a>
                    </div>
                </div>
               
                </div>
            
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="py-4">
            @yield('content')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        </div>
    </div>

    <!-- Footer -->
	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				</hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p>National Transaction Corporation is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
					<p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
				</div>
				</hr>
			</div>	
		</div>
	</section>
	<!-- ./Footer -->




</body>

<script>



const search = new Vue({
el:'#search',
data:{
    results:[],
    q:'',
    links:[],
    p:''
},
methods:{
    search(){
        axios.get('/api/search?q='+this.q)
        .then(function (response) {
            search.results = response.data[0];
            for(var i=0;i<search.results.length;i++){
                var res = search.results[i];
                axios.get('/api/fullurl/get?'+'c='+res.category_id+'&s='+res.slug)
                .then(function (response) {
                    search.links.push(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        })
        .catch(function (error) {
            console.log(error);
        });
    },
    r:
        _.debounce(function(){
            document.getElementById('res').style.display = 'none';
        },500)
        
    
},
watch:{
    q: _.debounce(function(){
        if(search.q.length>2){
            search.search()
            document.getElementById('res').style.display = 'block';
        }
        else search.results = [];
    },500)
},
mounted(){
    
}

});

</script>


</html>
