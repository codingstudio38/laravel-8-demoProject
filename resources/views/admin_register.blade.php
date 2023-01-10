<!DOCTYPE html>
<html >
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <title>Antibacterial Sanitizer Shop - Admin Register</title>
  <x-headerCss/> 
</head>
<body>
<x-Header menuName="register"/> 


<section class="content01 cid-snLXqdAfed" id="content01-6">
   
</section>


<section class="testimonials02 cid-snLXqPU6pR" id="testimonials02-7">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 title-col">
                <div class="title-wrap">
                    <h3 class="mbr-section-title mbr-fonts-style align-center display-2"><strong>Register Here</strong></h3>
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
<form action="{{url('/register')}}" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
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
<br>  
<style>
    .text-danger{
      color: red !important;  
    }
</style>   
<div class="form-group" data-for="text">
<input type="text" name="name" placeholder="Name"  data-form-field="text" class="form-control display-7" value="{{old('name')}}" id="name">
<span class="text-danger">@error('name') {{$message}} @enderror</span>
</div>  
<div data-for="email" class="form-group">
<input type="email" name="email" placeholder="Email"  data-form-field="email" class="form-control display-7" value="{{old('email')}}" id="email">
<span class="text-danger">@error('email') {{$message}} @enderror</span>
</div>
<div data-for="phone" class="form-group">
<input type="tel" name="phone" placeholder="Phone"  data-form-field="phone" class="form-control display-7" value="{{old('phone')}}" id="phone">
<span class="text-danger">@error('phone') {{$message}} @enderror</span>
</div>
<div data-for="phone" class="form-group">
<input type="password" name="password" placeholder="Password"  id="password" data-form-field="password" value="{{old('password')}}" class="form-control display-7">
<span class="text-danger">@error('password') {{$message}} @enderror</span>
</div>
<div>
<button type="submit"style="width: -webkit-fill-available;" class="btn btn-warning display-4">Register</button></div>
</form><!--Formbuilder Form-->
<br>
<div style="text-align: center">
<h6> <a href="{{url('/login')}}">Already have an account</a></h6>
</div>
</div>
        </div>
    </div>
</section>

{{-- footer section with js file added --}}
<x-Footer/>

</body>
</html>