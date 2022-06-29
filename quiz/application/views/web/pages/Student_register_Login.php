


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
 <!-- <link rel="stylesheet" href="  C:\xampp\htdocs\quiz\application\views\web\pages\css\bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>includes/dist/css/bootstrap.css"> -->

  <!-- style.css -->
 <!-- <link rel="stylesheet" href="css/style.css"> -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>includes/plugins/jquery/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <title>Hello, world!</title>
  
  <style>
  .vl {
    border-right : 5px solid #D1D0D0 ; //solid green
    height: 500px;
  }
  
// <div class="vl"></div>
</style>


</head>



<body class="container.fluid">

<img width="100px" src="<?php echo base_url(); ?>includes/dist/img/quiz_app.png" alt="<?php echo APP_TITLE; ?>" class="brand-image elevation-3" style="    position: absolute; padding: 10px; ">

<br>
  <div>&nbsp;</div>
  <div class="from-width">
  
   <div class="row">
   
       <div class="col-sm-6 offset-1">

        <div style="margin: auto;" class="mb-4 ">
          <h4 style="margin: auto; " class="mb-2">Registration</h4>
        </div>
        
        
        <div class="row ">
        
          <div class=" mb-3 col-md-6 col-10 ">
            <label for="fname" class="form-label">First Name :</label>
            <input type="text" class="form-control form-control-sm" id="fname" name="fname" placeholder="Enter Your First Name ">
          </div>

          <div class="mb-3 col-md-6 col-10 ">
            <label for="lname" class="form-label">Last Name :</label>
            <input type="text" class="form-control form-control-sm" id="lname" name="lname" placeholder="Enter Your Last Name">
          </div>
          
        </div>

<!--
        <div class="mb-3 col-md-12 col-10">
          <label for="scl_org_name" class="form-label">School / Organization Name :</label>
          <input type="text" class="form-control form-control-sm" id="scl_org_name" name="scl_org_name" placeholder="Enter Your School / Organization Name">
        </div>


        <div class="mb-3 col-md-12 col-10">
          <label for="address" class="form-label">Address :</label>
          <input type="text" class="form-control form-control-sm" id="address" name="address" placeholder="Enter Your Address">
        </div><!---->


        <div class="row ">

          <div class=" mb-3 col-md-6 col-10">
            <label for="mobile" class="form-label">Mobile No. :</label>
            <input type="number" class="form-control form-control-sm" id="mobile" name="mobile" maxlength="10"  placeholder="Enter Your Mobile No.">
          </div>

          <div class="mb-3 col-md-6 col-10">
            <label for="email" class="form-label">Email-ID :</label>
            <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Enter Your Email-ID">
          </div>

        </div>


        <div class="row ">

          <div class="form-group col-md-6 mb-3 col-10">
            <label for="class_id" class="form-label">Class :</label>
            <select class="form-select form-select-sm" value="" name="class_id" id="class_id">
              <option selected  value="">--Select--</option>
               <?php
         $c = 1; 
         foreach ($classes as $class) {
         
         echo "<option  value='".$class->class_id."'>".$class->class_name."</option>";
         }

?>

            </select>
          </div>

          </div>
<!--
          <div class="mb-3 col-md-6 col-10">
            <label for="dob" class="form-label">Date of birth :</label>
            <input type="date" class="form-control form-control-sm" id="dob" name="dob" placeholder="Enter Date Of Birth">
          </div>

        </div>



        <div class="form-group mt-2 mb-3 col-md-12 col-10 ">
          <label for="#" class="form-label">Gender :</label> &nbsp; &nbsp;
          <label for="male" class="form-label">Male <input type="radio" name="gender" value="male"></label> &nbsp;
          <label for="female" class="form-label">Female <input type="radio" name="gender" value="female"></label> &nbsp;
          <label for="other" class="form-label">Other <input type="radio" name="gender" id="other" value="other"></label> &nbsp;

        </div>

-->
        <div class="row ">

          <div class=" mb-3 col-md-6 col-10">
            <label for="password" class="form-label">Password :</label>
            <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Enter Your Password.">
          </div>

          <div class="mb-3 col-md-6 col-10">
            <label for="confirm_password" class="form-label">Confirm Password :</label>
            <input type="password" class="form-control form-control-sm" id="confirm_password" name="confirm_password" placeholder="Enter Your Password Again.">
          </div>

        </div>

      <div class="form-group mt-2 mb-3 col-md-12 col-10 ">
        <div class="d-grid gap-2 col-6  mt-3 " style="margin: auto;">
          <button type="button" class="btn btn-md btn-success" id="submit" onclick=" vali_nd_sub(this);"> Submit </button>
        </div>
      </div>


      </div>
      
      
        <!-- <div class="col-sm-1 ">
         
             <div class="vl" > </div>
         
         </div> -->
      
      
      <div class="col-sm-5">

        <div class="mb-4 col-8 offset-2">
          <h4>Login</h4>
        </div>


        <div class="mb-3 col-8 offset-2">
          <label for="student_email" class="form-label">Email-ID :</label>
          <input type="email" class="form-control form-control-sm" id="student_email" name="student_email" placeholder="Enter Your Email-ID">
        </div>


        <div class=" mb-5 col-8 offset-2 ">
          <label for="student_password" class="form-label">Password :</label>
          <input type="password" class="form-control form-control-sm" id="student_password" name="student_password" placeholder="Enter Your Password.">
        </div>


        <div class="d-grid gap-2 col-6 " style="margin: auto;">
          <button type="button" class="btn btn-md btn-primary" id="login" onclick=" validate_login(this);"> Login </button>
        </div>
       


      </div>
      
    </div>


    
</body>

</html>

<script>
  // $(document).ready(function() {


  // $('#formsubmit').click(function() {
  //   validateForm();
  // });
  
 
  
  function capitalizeFirstLetter(string)
  {
    return string.charAt(0).toUpperCase()+string.slice(1); 
     }

  function vali_nd_sub() {

 

    var nameReg = /^[A-Za-z]+$/;
    var numberReg = /^[0-9]+$/;
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    //      fname lname scl_org_name address mobile email class dob gender password confirm_password

    var fname = capitalizeFirstLetter($('#fname').val());
    var lname = capitalizeFirstLetter($('#lname').val());
    //var scl_org_name = $('#scl_org_name').val();
    //var address = $('#address').val();
    var mobile = $('#mobile').val();
    var email = $('#email').val();
    var class_id = $('#class_id').val();
    //var dob = $('#dob').val();
   // var gender = $("input[type=radio][name='gender']:checked").length;
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();
    
   

    $('.error').hide();

    if (fname == "") {
    $("#fname").focus();
      $('#fname').after('<span class="error" style="color:red;"> Please enter your first name </span>');
    } else if (!nameReg.test(fname)) {
    $("#fname").focus();
      $('#fname').after('<span class="error" style="color:red;"> Letters only </span>');
    } else if (lname == "") {
    $("#lname").focus();
      $('#lname').after('<span class="error" style="color:red;"> Please enter your last name </span>');
    } else if (!nameReg.test(lname)) {
    $("#lname").focus();
      $('#lname').after('<span class="error" style="color:red;"> Letters only </span>');
    } /*else if (scl_org_name == "") {
    $("#scl_org_name").focus();
      $('#scl_org_name').after('<span class="error" style="color:red;"> Please enter your School/Organization name</span>');
    } //else if (address == "") {
    $("#address").focus();
      $('#address').after('<span class="error" style="color:red;"> Please Enter your Address </span>');
    }*/else if (mobile == "") {
    $("#mobile").focus();
      $('#mobile').after('<span class="error" style="color:red;"> Please Enter your Mobile No. </span>');
    }else if (mobile.length <= 9 || mobile.length >= 11 ) {
    $("#mobile").focus();
      $('#mobile').after('<span class="error" style="color:red;"> Please Enter valid Mobile No. </span>');
    }else if (email == "") {
    $("#email").focus();
      $('#email').after('<span class="error" style="color:red;"> Please Enter your Email </span>');
    } else if (!emailReg.test(email)) {
    $("#email").focus();
      $('#email').after('<span class="error" style="color:red;"> Please Enter your valid Email Id.</span>');
    }else if (class_id == "") {
    $("#class_id").focus();
      $('#class_id').after('<span class="error" style="color:red;"> Please select your class </span>');
    }/* else if (dob == "") {
    $//("#dob").focus();
      $('#dob').after('<span class="error" style="color:red;"> Please enter your date of birth </span>');
    } else if (gender == 0) {
    $//("#gender").focus();
      $('#other').after('<span class="error" style="color:red;"> Please select your gender </span>');
    } */else if (password == "") {
    $("#password").focus();
      $('#password').after('<span class="error" style="color:red;"> Please enter your passsword </span>');
    } else if (password.length <= 6) {
    $("#password").focus();
      $('#password').after('<span class="error" style="color:red;"> Password must be at least 6 characters long </span>');
    } else if (confirm_password == "") {
    $("#confirm_password").focus();
      $('#confirm_password').after('<span class="error" style="color:red;"> Please enter your passsword again </span>');
    } else if (confirm_password != password) {
    $("#confirm_password").focus();
     
      $('#confirm_password').after('<span class="error" style="color:red;"> Confirm Password do not match with Password </span>');
    } else {
   
                  var gender = $("input[type=radio][name='gender']:checked").val();
                
                  $("#submit").prop("disabled", true);
                  $("#confirm_password").after("<br><font id='wait' color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Validating...</b></font>");

                
                  var base_url = '<?php echo base_url(); ?>';
                  $.ajax({
                      type: "POST",
                      dataType: "JSON",
                      url: base_url + "index/add_student_registration",
                      data: {
                          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                          "fname":fname,
                          "lname":lname,
                          "mobile":mobile,
                          "email":email,
                          "class_id":class_id,
                         "password":confirm_password
                      },
                      cache: false,
                      success: function(data, textStatus, jqXHR) {
                         
                         if (data.response == true) {
                           $('#wait').hide();
                           $("#fname").val("");
                           $("#lname").val("");
                           $("#scl_org_name").val("");
                           $("#address").val("");
                           $("#mobile").val("");
                           $("#email").val("");
                           $("input[type=radio][name='gender']:checked").prop("checked",false);
                           $("#class_id").val("");
                           $("#dob").val("");
                           $("#password").val("");
                           $("#confirm_password").val("");
                            $('#confirm_password').after('<span class="error" style="color:green;"><font color="green"><b>'+data.message+'</b></font> </span>');
                           
                            window.location = base_url+"index/home";
                         
                          } else {
                           $('#wait').hide();
                           $('#confirm_password').after('<span class="error" style="color:red;"><font color="red"><b>'+data.message+'</b></font> </span>');
                             
                          }
                          $("#submit").prop("disabled", false);

                      }
                  });
                
    }
  }

 
 
 function validate_login()
  {
   var student_email = $("#student_email").val();
   var student_password = $("#student_password").val();
   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   
   $('.error').hide();
   
   
   if(student_email.replace(/ /gi , "") == "" || re.test(student_email) == false)
    {
     $("#student_email").focus();
     $('#student_email').after('<span class="error" style="color:red;">Enter your valid Email-ID. </span>');
     
    }
   else if(student_password.replace(/ /gi , "") == "")
    {
     $("#student_password").focus();
      $('#student_password').after('<span class="error" style="color:red;"> Enter your Password. </span>');
    
    }
   else
    {
     $("#login").prop("disabled" , true);
      $('#student_password').after("<br><font id='wait'color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Validating...</b></font>");
     var base_url = '<?php echo base_url(); ?>';
         $.ajax({
                 type: "POST",
                 dataType: "JSON",
                 url: base_url+"index/validate_student_login",
                 data: { '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>' , 'student_email':student_email , 'student_password':student_password },
                 cache: false,
                 success: function (data, textStatus, jqXHR) {
	                  
	                  if(data.response == true)
	                   {
	                   $('#wait').hide();
	                    $('#student_password').after('<span class="error" style="color:green;"><font color="green"><b>'+data.message+'</b></font> </span>');
	                    window.location = base_url+"index/home";
	                   }
	                  else
	                   {
	                    $('#wait').hide();
	                    $('#student_password').after('<span class="error" style="color:red; margin:auto;"><font color="red"><b>'+data.message+'</b></font> </span>');
	                    $("#login").prop("disabled" , false);
	                   
	                   }
	                  
	         }
               });
    }
  }
 
</script>
