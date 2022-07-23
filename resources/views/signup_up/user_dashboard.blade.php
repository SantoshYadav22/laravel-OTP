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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
<body>
   @php
//    print_r($data) ;die();   
   @endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h4>DashBoard</h4>
            <table class="table table-hover">
                <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Date Of Dirth</th>
                    <th>Logout</th>
                    
                </thead>
                <tbody>
                    @foreach($data as $d1)
             
                   
                    <tbody>
                        <tr>
                            <td>{{$d1->fname}}</td>
                            <td>{{$d1->lname}}</td>
                            <td>{{$d1->email}}</td>
                            <td>{{$d1->mobile}}</td>
                            <td>{{$d1->dob}}</td>
                            <td><a href="{{route('auth.logout')}}">Logout</a></td>
                            
                        </tr> 
                      
                    </tbody>@endforeach
                </tbody>
            </table>
        </div>
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
