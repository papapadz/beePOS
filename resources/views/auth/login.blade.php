@extends('layouts.guest.app')

@section('content')
<div class="form">
    <img style="width: 250px;height: 200px;margin-bottom: 20px" src="{{asset('assets/img/BeePOS-logo.jpg')}}">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" method="POST" action="{{ url('login') }}">
        {{ csrf_field() }}
      <input name="username" type="text" placeholder="username"/>
      <input name="password" type="password" placeholder="password"/>
      <button>login</button>
      <!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
    </form>
  </div>
@endsection
