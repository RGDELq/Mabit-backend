





@if($message = Session::get('success'))

<div class="alert alert-info">
{{ $message }}
</div>

@endif

<body id="particles-js"></body>
<div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form  action="{{ route('Auth.validate_login') }}" method="post" name="form1" class="box" >
        @csrf
        <h4>Mabit <br><span>Dashboard</span></h4>
      <h5>Login</h5>


        <input type="text" name="email" placeholder="Email" autocomplete="off">
        @if($errors->has('email'))
        <i class="typcn typcn-eye" id="eye"></i>
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif

        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
        @if($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
      

        <input type="submit" value="Log in" class="btn1">
      </form>
  </div> 
       <div class="footer">
    </div>
</div>
<link rel="stylesheet" href="{{ asset('css/login.css') }}">






