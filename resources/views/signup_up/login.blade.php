<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="{{ asset('css/signup.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
 <style>
   .alert{
       position: relative;
    padding: 1rem 1rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    color: #842029;
    background-color: #f8d7da;
    border-color: #f5c2c7;
}
.alert1{
  color: #842029;
    background-color: #f8d7da;
    border-color: #f5c2c7;
}
 </style>
  </head>

<body>
    <div class="container">
        <main class="signup-container">
         
          <h1 class="heading-primary">Login<span class="custom-dot">.</span></h1>
          <p class="text-mute">Forgot Password? <a href="{{route('reset.password')}}">Forgot Password</a></p>
         
          {{-- onsubmit="handleLoginSubmit()" --}}
          <form class="signup-form" method="post" action="{{route('create.login')}}"  name="login" id="login">
            @if (Session::get('fail'))
                <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                </div>
            @endif
            @csrf

            <div class="f-row input-wrapper">
                {{-- <label class="inp">
                  <input type="text" class="input-text" placeholder="&nbsp;">
                  <span class="label">Mobile</span>
                  <span class="input-icon"><i class="fa-solid fa-address-card"></i></span>
                </label> --}}
            </div>
            <label class="inp">
              <input required type="email" value="{{old("email")}}" id="email" name="email" class="input-text" placeholder="&nbsp;">
              <span class="label">Email</span>
              <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
              <span class="alert1"> @error('email'){{$message}}@enderror</span>

            </label>
            <label class="inp">
              <input required type="password" value="{{old("password")}}" id="password" name="password" class="input-text alpha_newmeric" placeholder="&nbsp;" id="password">
              <span class="label">Password</span>
              <span class="input-icon input-icon-password" data-password><i class="fa-solid fa-eye"></i></span>
            </label>
            <span class="alert1"> @error('password'){{$message}}@enderror</span>

          
            <div class="col-lg-12 text-center" id="add_login_submit">
              <input type="submit" class="btn btn-success flex-center" id="form_login_btn" name="form_submit_btn" value="Login">
             </div>
          </form>
          <p class="text-mute">Back To Signup Page <a href="{{ route('sign_up') }}">Sign Up</a></p>

        </main>
        <div class="welcome-container">
          <h1 class="heading-secondary">Welcome to <span class="lg">Planner Buddy!</span></h1>
          <img src="https://png2.cleanpng.com/sh/82506800d9e08bf14cb0a38d53322fea/L0KzQYm3VsI1N6Rug5H0aYP2gLBuTfxieKV0iJ9taYPzfLLCTfRmfppofZ92dXz3eb7shPliNZ1miOZ4cD3wf7TylgAuPZM3fqNsMEC4RIKAUsQvOmU5SaUBMkm0RYOCWME1OGI7S6Y9NT7zfri=/kisspng-laptop-display-device-multimedia-laptop-mockup-5b2f1c00541724.2441362915298140163445.png" alt="">
        </div>
      </div>

</body>
<script src="{{asset('js/signup.js')}}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
 
<script src="{{ asset('js/jquery.alphanum.js') }}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>


<script>
    $(".alphabates").alphanum({
    allowSpace: true, // Allow the space character
    allowUpper: true,  // Allow Upper Case characters
    maxLength : 15,    // eg Max Length
    allowNumeric : false,  // Allow digits 0-9
});

$(".newmeric").alphanum({
    allowSpace: false, // Allow the space character
    allowUpper: false,  // Allow Upper Case characters
    maxLength : 10,    // eg Max Length
    allowLatin : false, // a-z A-Z
    // max:10,
    allowNumeric : true  // Allow digits 0-9
});

$(".decimal").numeric({
    allowDecSep: true,  //
    maxDigits: 7,
    maxDecimalPlaces    : 2,
    maxPreDecimalPlaces : 4,
    max:5000,
    min:1,
    allowNumeric : true  // Allow digits 0-9
});


$(".alphanewmeric").alphanum({
    allowSpace         : true,  // Allow the space character
    allowNewline       : true,  // Allow the newline character \n ascii 10
    allowNumeric       : true,  // Allow digits 0-9
    allowUpper         : true,  // Allow upper case characters
    allowLower         : true,  // Allow lower case characters
    allowLatin         : true,  // a-z A-Z
    forceUpper         : false, // Convert lower case characters to upper case
    forceLower         : false, // Convert upper case characters to lower case
    maxLength          : 12,    // eg Max Length
   
});

$(".alpha_newmeric").alphanum({
    allowSpace         : true,  // Allow the space character
    allow              : '_',  // Allow
    allowNewline       : true,  // Allow the newline character \n ascii 10
    allowNumeric       : true,  // Allow digits 0-9
    allowUpper         : true,  // Allow upper case characters
    allowLower         : true,  // Allow lower case characters
    allowLatin         : true,  // a-z A-Z
    forceUpper         : false, // Convert lower case characters to upper case
    forceLower         : false, // Convert upper case characters to lower case
    maxLength          : 9    // eg Max Length
});
</script>
<script src="{{asset('js/signup.js')}}"></script>

</html>
