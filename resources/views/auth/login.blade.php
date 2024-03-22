@extends('layouts.home')

@section('content')

@include('layouts.home-navbar')

<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="row border rounded-5 p-3 bg-white shadow box-area">
  <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #1b5f24;">
      <div class="featured-image mb-3">
       <img src="{{ asset('assets/img/dar-logo.png')}}" class="img-fluid" style="width: 250px;">
      </div>
  </div>      
  <div class="col-md-6 right-box">
     <div class="row align-items-center">
           <div class="header-text mb-4">
                <h2 class="text-center fs-1" style="font-weight: bold;">Login</h2>
           </div>
           <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="input-group mb-4">
              <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') }}" required autocomplete="username" autofocus>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="input-group mb-4">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="input-group mb-3" >
                <button type="submit" class="btn btn-lg w-100 fs-6" style="background: #1b5f24; color: #ffff;">Login</button>
            </div>
          </form>
     </div>
  </div> 
 </div>
</div>
@endsection
