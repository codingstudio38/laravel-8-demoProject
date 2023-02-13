<!DOCTYPE html>
<html >
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <title>Antibacterial Sanitizer Shop - Admin Login</title>
  <x-headerCss/> 
</head>
<body>
<x-Header menuName="login"/> 


<section class="content01 cid-snLXqdAfed" id="content01-6">
   
</section>
 
 
<section class="testimonials02 cid-snLXqPU6pR" id="testimonials02-7">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 title-col">
                <div class="title-wrap">
                    <h3 class="mbr-section-title mbr-fonts-style align-center display-2"><strong>Login Here</strong></h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="form2 cid-snLXn0G4ji" id="form02-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto mbr-form" data-form-type="formoid">
<!--Formbuilder Form-->
<form action="{{url('/login')}}" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
    @csrf
<div class="col-md-6" style="margin: auto">
  @if(session()->has('massage'))
 <div class="alert alert-success show" role="alert"  id="sxd" >
  <strong>Status..</strong> {{ session()->get('massage') }}
  <button type="button" class="btn btn-danger close" style="margin-top: -12px;" data-dismiss="alert" aria-label="Close" onclick="{$('#sxd').fadeOut('slow');}">
    <span aria-hidden="true">&times;</span>
  </button>
 </div>
@endif   
@if(session()->has('wrongsms'))
 <div class="alert alert-danger show" role="alert"  id="sxd" >
  <strong>Status..</strong> {{ session()->get('wrongsms') }}
  <button type="button" class="btn btn-danger close" style="margin-top: -12px;" data-dismiss="alert" aria-label="Close" onclick="{$('#sxd').fadeOut('slow');}">
    <span aria-hidden="true">&times;</span>
  </button>
 </div>
@endif  
<br>     
<div data-for="email" class="form-group">
<input type="email" name="email" required placeholder="Email" data-form-field="email" class="form-control display-7"  id="email">
</div>
<div data-for="phone" class="form-group">
<input type="password" name="password" required placeholder="Password" id="password" data-form-field="password" class="form-control display-7">
</div>
<div> 

<button type="submit"style="width: -webkit-fill-available;" class="btn btn-warning display-4">Login</button>
<div style=" text-align: center; margin-top: 5px; ">
    <p>OR</p>
</div>
 
<a href="{{ action('App\Http\controllers\GoogleController@LoginWithGoogle') }}" style=" background-color: #ed430c !important; border-color: #ff0000 !important; margin-top:-5px; color:white !important;width: -webkit-fill-available;" class="btn btn-danger"><i style="margin-right:5px;" class="fa fa-google" aria-hidden="true"></i> Login with Google</a>

  












<a href="{{ action('App\Http\controllers\FacebookController@LoginWithFacebook') }}" style="background-color: #665dd8  !important; border-color: #665dd8  !important; margin-top:10px; color:white !important;width: -webkit-fill-available;" class="btn btn-danger"><i style="margin-right:5px;" class="fa fa-facebook" aria-hidden="true"></i> Login with Facebook</a>















</div>
</form><!--Formbuilder Form-->
<br>
<div style="text-align: center">
<h6> <a href="{{url('/register')}}">I don't have an account</a></h6>
</div>
</div>
        </div>
    </div>
</section>

{{-- footer section with js file added --}}
<x-Footer/>

</body>
</html>