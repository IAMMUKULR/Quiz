 

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>includes/plugins/fontawesome-free/css/all.min.css">
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
 <!-- <link rel="stylesheet" href="  C:\xampp\htdocs\quiz\application\views\web\pages\css\bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>includes/dist/css/bootstrap.css"> -->

  <!-- style.css -->
 <!-- <link rel="stylesheet" href="css/style.css"> -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>includes/plugins/jquery/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="<?php echo base_url(); ?>includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!---PIE Chart----->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!--
<script
src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"
></script>

<script
src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"
></script>
-->




  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>includes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>includes/dist/css/adminlte.min.css">


  <title>Hello, world!</title>
  
  <style>
  
  .modal-size{
          max-width:70%
    }
 
   @media(max-width:992px){
           .modal-size{
                 max-width:100%
            }
    }  
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      
      .fullscreen-container{
        display:none;
        position:fixed;
        top:0;
        bottom:0;
        left:0;
        right:0;
        background:rgba(90,90,90,0.5);
        z-index:9999;
      }
      
      #popdiv{
        text-align: center;
      
      }
      
      body{
      background-image: url("https://www.transparenttextures.com/patterns/cubes.png");
      }
      
      
      
    </style>
  
  
</head>

 

<!-- Navbar -->
  <nav class=" navbar navbar-expand navbar-white navbar-light container"><br><br><br><br><br>
  <img width="100px" src="<?php echo base_url(); ?>includes/dist/img/quiz_app.png" alt="<?php echo APP_TITLE; ?>" class="navbar-brand" style="    position: absolute; padding: 10px; ">
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-cog " aria-hidden="true"  ></i>       </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         <!-- <a  class="dropdown-item">
            <i class="fas fa-edit"></i> Edit Profile
          </a> -->
          <div class="dropdown-divider"></div>
          <a onclick="change_password_open(this);" class="dropdown-item">
            <i class="fas fa-pen"></i> Change Password 
          </a>
          <div class="dropdown-divider"></div>
          <a onclick="student_logout(this);" class="dropdown-item">
            <i class="fas fa-power-off"></i> Logout
          </a>
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->


<body class="container.fluid"  >

       <div class="container" id="home"> 
   
             <!--<div class="row py-lg-5"> -->
              <div class="col-lg-6 col-md-8 mx-auto  text-center">
                <h1 class="fw-light ">Welcome <?php echo $fname; ?></h1>
                <p class="lead text-muted  "> <?php echo $email; ?> | <?php echo $mobile ; ?> | <?php  foreach($classes as $class){   if($class->class_id == $class_id){ echo $class->class_name; } }  ?></p>
              </div>
            <!--</div>-->
 
  
  
  
    <!-- header --->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="my_quiz-tab" data-bs-toggle="tab" data-bs-target="#my_quiz" type="button" role="tab" aria-controls="my_quiz" aria-selected="true">My Quiz</button>
                </li>
                <li class="nav-item" role="presentation">
                        <button class="nav-link" id="my_result-tab" data-bs-toggle="tab" data-bs-target="#my_result" type="button" role="tab" aria-controls="my_result" aria-selected="false">My Result</button>
                </li>
        
        </ul>
        <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="my_quiz" role="tabpanel" aria-labelledby="my_quiz-tab">
                        <div class="pt-3"  id="quiz_list_div1"> 
                                 <div class="container" id="quiz_list_div"> </div>
                        </div>
                </div>
                <div class="tab-pane fade" id="my_result" role="tabpanel" aria-labelledby="my_result-tab">
                        <div class="pt-3"  id="result_list_div2"> 
                                 <div class="container" id="result_list_div"> </div>
                        </div>
                </div>
          
        </div>    
   
   
  
  
         <!----->
        <!-- Modal -->
            <div class="modal fade" id="quiz_result_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-size " role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="staticBackdropLabel">Result</h5>
                           <div> 
                             <button  class="btn  btn-sm btn-outline-dark"  >
                                <span id="marks" ></span> 
                            </button>
                             <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                             </div>
                        </div>
                        <div class="modal-body" >
                            
                     <div class="col-sm-12 ">
                          <div id="q_r_u"  class="  card ml-2 mr-2" style=" padding: 10px; " ></div> 
                     </div> 
                     
                    
                     
                
                         <div class="col-sm-12" id="questions_list_div"></div>
                         
                         
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  " id="myChart_div"></div> 
                      
                         
                         
                        </div>

                        <div class="modal-footer">
                           
                           
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           
                           
                        </div>
                    </div>
                </div>
            </div>
    
    
    <div class="fullscreen-container">
   <!--- <div id="popdiv" style="  width:100%;  text-align: center; background-color:grey;">
  
          <i class="fab fa-battle-net display-2 mt-3" style="color:black;" ></i><br><p style="color:white;"> click to reload </p>
          
    </div>--->
    </div>
    
    </div>
    
   
    <!-- changepassword -->
          <div class="container" id="change_password">
        
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <h5 class="m-0">Change Password</h5>
            </h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="old_password">Old Password</label>
              <input type="password" class="form-control" id="old_password" placeholder="Enter your old password." />
            </div>
            <div class="form-group">
              <label for="new_password">New Password</label>
              <input type="password" class="form-control" id="new_password" placeholder="Enter your new password." />
            </div>
            <div class="form-group">
              <label for="renew_password">Re-type New Password</label>
              <input type="password" class="form-control" id="renew_password" placeholder="Enter again your new password." />
            </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="cp_btn" onclick="change_password();">Submit</button>
              </div>
              <div class="col-sm-10 text-right" id="err_msg">
                &nbsp;
              </div>
            </div>
          </div>
        </div>
        
      </div><!--/. container-fluid -->
              
</body>

</html>

<script>

$("#home").show();

$("#change_password").hide();

function change_password_open(){
$("#home").hide();
$("#change_password").show();
}


function change_password()
    {
     var old_password = $("#old_password").val();
     var new_password = $("#new_password").val();
     var renew_password = $("#renew_password").val();
     if(old_password.replace(/ /gi , "") == "")
      {
       $("#old_password").focus();
       $("#err_msg").html("<font color='red'><b>Enter your old password.</b></font>");
      }
     else if(new_password.replace(/ /gi , "") == "")
      {
       $("#new_password").focus();
       $("#err_msg").html("<font color='red'><b>Enter your new password.</b></font>");
      }
     else if(renew_password.replace(/ /gi , "") == "")
      {
       $("#renew_password").focus();
       $("#err_msg").html("<font color='red'><b>Enter again your new password.</b></font>");
      }
     else if(new_password != renew_password)
      {
       $("#renew_password").focus();
       $("#err_msg").html("<font color='red'><b>Password not matched.</b></font>");
      }
     else if(old_password == renew_password)
      {
       $("#new_password").focus();
       $("#err_msg").html("<font color='red'><b>Old Password and new password should not be same.</b></font>");
      }
     else
      {
       $("#cp_btn").prop("disabled" , true);
       $("#err_msg").html("<font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Validating...</b></font>");
       var base_url = '<?php echo base_url(); ?>';
           $.ajax({
                   type: "POST",
                   dataType: "JSON",
                   url: base_url+"index/validate_change_password",
                   data: { '<?php  echo $this->security->get_csrf_token_name(); ?>':'<?php  echo $this->security->get_csrf_hash(); ?>' , 'student_id':'<?php echo $_SESSION["student_data"]["student_id"]; ?>' , 'old_password':old_password , 'new_password':new_password , 'renew_password':renew_password },
                   cache: false,
                   success: function (data, textStatus, jqXHR) {
	                    
	                    if(data.response == true)
	                     {
	                      $("#err_msg").html("<font color='green'><b>"+data.message+"</b></font>");
	                      window.location = base_url+"index/home";
	                     }
	                    else
	                     {
	                      $("#cp_btn").prop("disabled" , false);
	                      $("#err_msg").html("<font color='red'><b>"+data.message+"</b></font>");
	                     }
	                    
	           }
                 });
      }
    }


//function fadeIn(){
//  $('.fullscreen-container').fadeTo(200,1);
//};


$("#fadeout_btn").click(function(){
  $('.fullscreen-container').fadeOut(200);
});



 function get_all_questions_r(quiz_id) {
 
              $("#myChart_div").html("");
              
              var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "index/get_student_quiz_result",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                      "quiz_id": quiz_id,
                      "student_id": '<?php echo $student_id; ?>'
                  },
                  cache: false,
                  success: function(data, textStatus, jqXHR) {
                 
                       if (data.response == true) {
                          var validImgExtensions = ['jpg','png','jpeg', 'gif', 'tiff'];
                          var validAudioExtensions = ['mp3','m4a','wav'];
                          var txt = "";
                          
                           var marks = 0 ;
                           var total_marks = 0 ;
                           var q_n= 1;
                           var total_q = data.total_record;
                           var right_a = 0;
                           var wrong_a = 0;
                           //var una_q = 0;
                           
                          
                         for (var i = 0; i < data.total_record; i++) {

                            

                              total_marks += parseInt(data.questions_all_record[i].question_marks);

                              txt += ' <div class="row card ml-2 mr-2" >  ';
                              txt += '<div class="list-group-item"> ';
                              txt += '<div class="col-12 "> ';
                              
                              if(data.questions_all_record[i].category_details.length){
                              
                                txt += '<div class="row"> <div class="col-sm-6 text-start" > <p> <b> Category Type : </b>'+ data.questions_all_record[i].category_details[0].category_name +'</p> </div>'
                                
                                txt += '<div class="col-sm-6 text-end" > <p> <b> Marks : </b>'+ data.questions_all_record[i].question_marks +'</p></div></div>'
                                
                                txt += '<hr> ';
                              }
                              
                              
                              if (data.questions_all_record[i].question_description != "" ){

                              txt +=  '<p><B> Description: </b> '+  data.questions_all_record[i].question_description +' </p>';}
                              
                              txt +=  '<p> <B> Question '+q_n+' : </b>'+  data.questions_all_record[i].question_text +' </p>';
                              
                              if ( data.questions_all_record[i].question_img_extension != "" && data.questions_all_record[i].question_img_extension != null){
                              
                              if (validImgExtensions.includes(data.questions_all_record[i].question_img_extension)){
                              txt += ' <img src="<?php echo base_url(); ?>quiz_img/question_img/'+data.questions_all_record[i].question_id+'.'+data.questions_all_record[i].question_img_extension+'" class="img-fluid" alt="Responsive image"> ';
                              }
                              else if (validAudioExtensions.includes(data.questions_all_record[i].question_img_extension)){
                              txt += '<audio controls style="padding: 5px;" ><source src="<?php echo base_url(); ?>quiz_img/question_img/'+data.questions_all_record[i].question_id+'.'+data.questions_all_record[i].question_img_extension+'" type="audio/ogg">Your browser does not support the audio element.</audio> ';
                              }
                              
                              }
                              

                              
                              
                              txt += '<hr> ';
                              txt +=  '<div class="row ">';
                                if(data.questions_all_record[i].question_details != false)
                                    {
                                       for(var j = 0; j < data.questions_all_record[i].question_details.length; j++)
                                         {
                                          var bgcol = "";
                                          if(data.questions_all_record[i].student_response != false)
                                           {
                                            if(data.questions_all_record[i].student_response[0].trans_question_id == data.questions_all_record[i].question_details[j].trans_question_id)
                                             {
                                              if(data.questions_all_record[i].question_details[j].correct_option_status == 1)
                                               {
                                                bgcol = "style='color:green;'";
                                                right_a++;
                                                marks += parseInt(data.questions_all_record[i].question_marks);
                                               }
                                              else
                                               {
                                                bgcol = "style='color:red;'";
                                                 wrong_a++
                                               marks -= parseInt(data.questions_all_record[i].question_negative_marks);
                                               }
                                             }
                                           }
                                          
                                             txt +=  '<div class="col-sm-6">';
                                             txt +=  '<p id="'+data.questions_all_record[i].question_details[j].trans_question_id+'">';

                                             var icon  = (data.questions_all_record[i].question_details[j].correct_option_status == 1) ?  '<i class="far fa-check-circle" style="color:green;" ></i>':  '<i class="far fa-times-circle" style="color:white;" ></i>';

                                             txt += icon;
                                             txt += '<span '+bgcol+'><b> Option'+( j + 1) +':</b> &nbsp; '+data.questions_all_record[i].question_details[j].option_text+'</span></p>';
                                             
                                              if ( data.questions_all_record[i].question_details[j].option_img_extension != null  ){
                                     if(validImgExtensions.includes(data.questions_all_record[i].question_details[j].option_img_extension)){
                                     txt += ' <img src="<?php echo base_url(); ?>quiz_img/option_img/'+data.questions_all_record[i].question_details[j].trans_question_id+'.'+data.questions_all_record[i].question_details[j].option_img_extension+'" class="img-fluid" alt="Option image"> ';
                                     }else if (validAudioExtensions.includes(data.questions_all_record[i].question_details[j].option_img_extension)){
                              txt += '<audio controls style="padding: 5px;"><source src="<?php echo base_url(); ?>quiz_img/option_img/'+data.questions_all_record[i].question_details[j].trans_question_id+'.'+data.questions_all_record[i].question_details[j].option_img_extension+'" type="audio/ogg">Your browser does not support the audio element.</audio> ';
                              }
                                     
                              
                              }
                                             
                                             
                                             txt +=  '</div>';
                                         }
                                    }
                              txt +=  '</div>';
                              txt += '<hr> ';
                              txt +=  '</div>';
                              txt +=  '</div>';
                              txt +=  '</div><br>';
                              q_n++;
                            
                              
                        }
                        
                        
                        
                         //una_q = total_q -( right_a + wrong_a); ,"Unattempted Questions", "#2F3E75" ,una_q
                              drawChart(right_a,wrong_a);
                        
                        var q_r_u = ' <div class="row " >';
                              q_r_u +=    '<div class="text-dark col-md-4 col-sm-6"> total Question '+total_q+' </div> ';
                              q_r_u +=   ' <div class="text-success col-md-4 col-sm-6"> Right Answer '+right_a+' </div>';
                              q_r_u +=     ' <div class="text-danger col-md-4 col-sm-6">Wrong Answer '+wrong_a+' </div>';
                               
                              q_r_u +=  '</div>';
                        
                           $("#q_r_u").html(q_r_u);
                           
                           $("#questions_list_div").html(txt);
                           
                           
                           $("#marks").html(  " FINAL SCORE : " + marks + " &nbsp; out of "+ total_marks );
                      } else {
                             $("#questions_list_div").html("<center><font color='red'><b>" + data.message + "</b></font></center>");

                      } 

                  }
              });
          }
          


                             google.charts.load("current", {packages:["corechart"]});
                         
                             function drawChart(right_a,wrong_a) {
                                
                                $("#myChart_div").html('<center><div id="myChart"></div></center>');
                                
                                var data = google.visualization.arrayToDataTable([
                                  ['Answers', 'Number'],
                                  ['Right',     right_a],
                                  ['Wrong',      wrong_a]
                                ]);

                                var options = {
                                  title: 'My Quiz Result',
                                  pieHole: 0.2,
                                  legend: {'position': 'right'},
                                  chartArea:{left:70,top:20,height:'75%'}
                                };

                                var chart = new google.visualization.PieChart(document.getElementById('myChart'));

                                chart.draw(data, options);
                                
                                color_hide();
                              }
                              
                              function color_hide()
                               {
                                 
                                 $("rect").attr("width","300");
                                
                               }
                              


var coms_quiz_id = [];



  function student_logout() {
      
      var base_url = '<?php echo base_url(); ?>';
      window.location = base_url+"index/student_logout";

  }
  
  
  function get_all_quiz() {
  
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                var quiz_sno = 0;


                today = yyyy + '-' + mm + '-' + dd ;
               
                today = Date.parse(today);

              $("#quiz_list_div").html("<center><font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Loading...</b></font></center>");
              var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "index/get_all_quiz",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
 
                  },
                  cache: false,
                  success: function(data, textStatus, jqXHR) {
                                
                                var txt = "";
                                
                      if(data.response == true){
                          txt += "<table class='table table-bordered table-sm' style='font-size:12px;'>";
                          txt += "<thead>";
                          txt += "<tr>";
                          txt += "<th width=''>Sr.No.</th>";
                          txt += "<th width=''>Quiz Name</th>";
                          txt += "<th width=''>Description</th>";
                          txt += "<th width=''>Subject</th>";
                          txt += "<th width=''>Quiz Date</th>";
                          txt += "<th width='9%'></th>";
                          txt += "</tr>";
                          txt += "</thead>";
                          txt += "<tbody>";
                          
                           for (var i = 0; i < data.all_record.length ; i++){
                           
                                var sd = Date.parse(data.all_record[i].quiz_start_date);
                                var ed = Date.parse(data.all_record[i].quiz_end_date);
                                
                              quiz_sno++
                              txt += "<tr>";
                              txt += "<td>" + quiz_sno + "</td>";
                              txt += "<td>" + data.all_record[i].quiz_name +" </td>";
                              txt += "<td>" + data.all_record[i].quiz_description + "</td>";
                              
                              txt += "<td>" + data.all_record[i].subject_name + "</td>";
                              
                              txt += "<td>" + data.all_record[i].quiz_start_date + " to "+data.all_record[i].quiz_end_date+"</td>";
                              
                              
                               if (today >= sd && today <= ed ) {
                                    txt += '<td><button type="button" class="btn btn-sm btn-success start_btn"  id="login" onclick=start_quiz('+data.all_record[i].quiz_id+',"'+data.all_record[i].enc+'");> Start Quiz </button></td>';
                                }else{
                                    txt += '<td><button type="button" class="btn btn-sm btn-warning "  id="login" > Upcoming </button></td>';
                                }
                              
                           }
                          txt += "</tbody>";
                          txt += "</table>";
                          $("#quiz_list_div").html(txt);
                      }else{
                       $("#quiz_list_div").html("<center><font color='red'><b>" + data.message + "</b></font></center>");
                      }      
                 }
                 
              });
          }

  function get_all_result() {
              $("#quiz_list_div").html("<center><font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Loading...</b></font></center>");
              var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "index/get_all_quiz_r",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
 
                  },
                  cache: false,
                  success: function(data, textStatus, jqXHR) {
                     
                                var txt = "";
                                
                      if(data.response == true){
                          txt += "<table class='table table-bordered table-sm' style='font-size:12px;'>";
                          txt += "<thead>";
                          txt += "<tr>";
                          txt += "<th width=''>Sr.No.</th>";
                          txt += "<th width=''>Quiz Name</th>";
                          txt += "<th width=''>Description</th>";
                          txt += "<th width=''>Subject</th>";
                          txt += "<th width='7%'></th>";
                          txt += "</tr>";
                          txt += "</thead>";
                          txt += "<tbody>";
                           for (var i = 0; i < data.all_record.length ; i++){
                           
                           txt += "<tr>";
                              txt += "<td>" + parseInt(i + 1) + "</td>";
                              txt += "<td>" + data.all_record[i].quiz_name +" </td>";
                              txt += "<td>" + data.all_record[i].quiz_description + "</td>";
                              
                              txt += "<td>" + data.all_record[i].subject_name + "</td>";
                           
                              txt += '<td><button type="button" class="btn btn-sm btn-success result_btn" data-toggle="modal" data-target="#quiz_result_modal" id="login" onclick=get_all_questions_r('+data.all_record[i].quiz_id+')  > Result </button></td>';
                              txt += "</tr>";
                        
                           }
                          txt += "</tbody>";
                          txt += "</table>";
                          $("#result_list_div").html(txt);
                      }else{
                       $("#result_list_div").html("<center><font color='red'><b>" + data.message + "</b></font></center>");
                      }      
                 }
                 
              });
          }





        function start_quiz(quiz_id,enc){
        
        $(".start_btn").prop('disabled', true);
        var base_url = '<?php echo base_url(); ?>';
        var quiz_id = quiz_id;
        
        //fadeIn();
        window.open(base_url +"index/quiz_started/" +  encodeURI(quiz_id) + "/" + enc ,"","fullscreen=yes, toolbar=no, menubar=no");
         
        //window.location =  base_url + "index/quiz_started";
        $(".start_btn").prop('disabled', false);
        }
        
        
        

          get_all_quiz();
          get_all_result();
 
</script>
