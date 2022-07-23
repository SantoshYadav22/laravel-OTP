const eyeClick = document.querySelector("[data-password]");
const password_elem = document.getElementById("password");

eyeClick.onclick = () => {
  const icon = eyeClick.children[0];
  icon.classList.toggle("fa-eye-slash");
  if (password_elem.type === "password") {
    password_elem.type = "text";
  } else if (password_elem.type === "text") {
    password_elem.type = "password";
  }
};


const handleSubmit=()=>{
  event.preventDefault();
  let formData=new FormData(document.getElementById('signup'));
  // var cuisine_name = formData.get("cuisine_name");
  $("#add_sign_submit").html(
      `<img height="30" width="30"  src="images/spinner.gif" alt="">`
  );
  $.ajax({
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url:'/create/create',
      type: 'POST',
      data:  formData,
      dataType:'json',
      cache: false,
      contentType: false,
      processData: false,    
          success:function(response){
            console.log(response);
            if (response) {
              $("#add_sign_submit")
                  .html(`<button type="submit" class="btn btn-success flex-center btn-sm">Create Account</button>
                  <button type="button" class="btn btn-secondary flex-center btn-sm"
                  data-dismiss="modal">Close 1</button>`);
              $("#signup")[0].reset();
            }       
      },
      error: function (err) {
          // alertServiceFunction("Error", "Failed to Add  Banner.", "error");
          $("#add_sign_submit")
          .html(`<button type="submit" class="btn btn-success flex-center btn-sm">Create Account</button>
          <button type="button" class="btn btn-secondary flex-center btn-sm"
          data-dismiss="modal">Close3 </button>`);
      },
  });
}

const handleLoginSubmit=()=>{
  event.preventDefault();
  let formData=new FormData(document.getElementById('login'));
  // var cuisine_name = formData.get("cuisine_name");
  $("#add_sign_submit").html(
      `<img height="30" width="30"  src="images/spinner.gif" alt="">`
  );
  $.ajax({
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url:'/create/login',
      type: 'POST',
      data:  formData,
      dataType:'json',
      cache: false,
      contentType: false,
      processData: false,    
          success:function(response){
            console.log(response);
            if (response) {
              $("#add_login_submit")
                  .html(`<button type="submit" class="btn btn-success flex-center btn-sm">Login</button>
                  <button type="button" class="btn btn-secondary flex-center btn-sm"
                  data-dismiss="modal">Close 1</button>`);
              $("#login")[0].reset();
            }       
      },
      error: function (err) {
          // alertServiceFunction("Error", "Failed to Add  Banner.", "error");
          $("#add_login_submit")
          .html(`<button type="submit" class="btn btn-success flex-center btn-sm">Login</button>
          <button type="button" class="btn btn-secondary flex-center btn-sm"
          data-dismiss="modal">Close3 </button>`);
      },
  });
}

const handlereset=()=>{
  event.preventDefault();

  var email = document.getElementById('_email').value;
  if(email ==""){
    document.getElementById('email_error').innerHTML="Enter Email first";
    // document.getElementById('otp').style.display='none';
    // document.getElementById('pass').style.display='none'
    // document.getElementById('add_reset_submit').style.display='block';

  }
  
  if(email.length > 12){
    var randomNum = Math.floor((Math.random() * 10011) + 1);
    var el = document.getElementById('ranNum');
    el.innerHTML = randomNum;
    // function sendEmail(el) {
    //   Email.send({
    //     Host: "smtp.gmail.com",
    //     Username: "sender@email_address.com",
    //     Password: "Enter your password",
    //     To: 'receiver@email_address.com',
    //     From: "sender@email_address.com",
    //     Subject: "Sending Email using javascript",
    //     Body: "Well that was easy!!",
    //   })
    //     .then(function (message) {
    //       alert("mail sent successfully")
    //     });
    // }
    // sendEmail(el);
    document.getElementById('email_error').style.display='none';
    document.getElementById('otp').style.display='block';
    document.getElementById('pass').style.display='block';
    var button = document.getElementById("reset_password"); 
    button.onclick = function reset_password() {  
    // console.log(el);
   }
    document.getElementById('reset_password').style.display='none';
    document.getElementById('send_otp').style.display='block';
  
  }  
  let formData=new FormData(document.getElementById('reset'));
  formData.append('key2', randomNum);
  
$.ajax({
  headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
  url:'/reset/otp',
  type: 'POST',
  data:  formData,
  dataType:'json',
  cache: false,
  contentType: false,
  processData: false,    
      success:function(response){
        console.log(response);
        if (response.success) {
          // $("#add_reset_submit")
          //     .html(`<button type="submit" class="btn onclick="confirm_otp()"; btn-success flex-center btn-sm">Submit6</button>
          //     <button type="button" class="btn btn-secondary flex-center btn-sm"
          //     data-dismiss="modal">Close 1</button>`);
        }   
        else{
          $("#add_reset_submit")
          .html(`<button type="submit" class="btn btn-success flex-center btn-sm">else error</button>
          <button type="button" class="btn btn-secondary flex-center btn-sm"
          data-dismiss="modal">error </button>`);
          $("#reset")[0].reset();
        }    
  },
  error: function (err) {
      $("#add_reset_submit")
      .html(`<button type="submit" class="btn btn-success flex-center btn-sm">error</button>
      <button type="button" class="btn btn-secondary flex-center btn-sm"
      data-dismiss="modal">error </button>`);
  },
});
}


const confirm_otp=()=>{
  event.preventDefault();
  let formData=new FormData(document.getElementById('reset'));
  
$.ajax({
  headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
  url:'/confirm/otp_check',
  type: 'POST',
  data:  formData,
  dataType:'json',
  cache: false,
  contentType: false,
  processData: false,    
      success:function(response){
        console.log(response);
        if (response.success) {
          // $("#add_reset_submit")
          //     .html(`<button type="submit" class="btn onclick="confirm_otp()"; btn-success flex-center btn-sm">Submit6</button>
          //     <button type="button" class="btn btn-secondary flex-center btn-sm"
          //     data-dismiss="modal">Close 1</button>`);
     
            remove_otp()          
            $("#reset")[0].reset()        
        }   
        else{
          $("#add_reset_submit")
          .html(`<button type="submit" class="btn btn-success flex-center btn-sm">else confirm_otp </button>
          <button type="button" class="btn btn-secondary flex-center btn-sm"
          data-dismiss="modal">confirm_otp  </button>`);
          $("#reset")[0].reset();
          remove_otp() 
        }    
  },
  error: function (err) {
      $("#add_reset_submit")
      .html(`<button type="submit" class="btn btn-success flex-center btn-sm">error</button>
      <button type="button" class="btn btn-secondary flex-center btn-sm"
      data-dismiss="modal">error </button>`);
      remove_otp() 
  },
});
}

const remove_otp=()=>{ 
 
  var prinnt = document.getElementById('prints').value;
  console.log(prinnt)
 
  let formData=new FormData(document.getElementById('prinnt'));
$.ajax({
  headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
  url:'/remove/clear_otp',
  type: 'POST',
  data:  formData,
  dataType:'json',
  cache: false,
  contentType: false,
  processData: false,    
      success:function(response){
        console.log(response);
        alert('hello done')
          
  },
 
});

}

