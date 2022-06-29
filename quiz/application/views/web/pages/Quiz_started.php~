 

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
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

  <title> Welcome to Quiz </title>
  
  <style>
   /*   .bd-placeholder-img {
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
      }*/
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
    </style>
  
  
</head>

 


<body class="container.fluid bg-light">

<!-- <button onclick="refresh(this)" >
      refresh
</button> -->

<!---<button onclick="refresh(this)" >
      refresh
</button> -->



<!-- quiz_name -->
<div id='quiz_name_div' >
 <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-9  mx-auto my-5">
      <h1 class="fw-normal" id="quiz_name"></h1>
      <p class=" fw-small" id="quiz_de"></p>
      <hr>
      <h5>Instruction</h5>
       <p class="  fw-small" id="quiz_in"></p>
       <h6 class="" id="total_marks" > Total Marks:  </h6>
      <a class="btn btn-outline-secondary btn-sm ps-4 pe-4" href="javascript:;" onclick="start();" >Start</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>
 </div>




<!-- quiz_name -->
<div id='quiz_qus' class="container" style=" display:none " >

<!--  <div class="heading- text-end " > <h4> <span id="time"></span> minutes </h4> </div>  -->
<br>
<div class="row">
 <div class=" col-sm-6 text-start " > <h4> <span id="category_name"></span> </h4> </div> 
 <div class=" col-sm-6 text-end " > <h6> Marks : <span id="marks_for_this"></span></h6> </div>
</div>
 <br>  
  <div class="position-relative overflow-hidden p-3 p-md-2 m-md-2 m-lg-4 text-start bg-light">
    <div class="list-group-item">
        <div class="col-12">
        
          <p class="lead  mb-3 fw-normal" id="description" ><b> Description: </b> &nbsp; <span id="question_description"> &nbsp; </span></p>
            
            <p class="lead  fw-normal mt-3 mb-3" id="q_img" ><b> Question <span id="question_number"><span/> </b> &nbsp; <span id="question_name"  > &nbsp; </span></p>
            
            <div id="question_img">  </div>
           
          
            
            <hr /> <br>
            <div class="row">
            
            <div class="row" id="opt"></div>
                
            </div>
          
        </div>
       
    </div>
</div>

 
 <div class="text-end" id ="next_end">
  <!--- button -->
 </div>
  
 </div>
  
  
  
  
 
  
</body>

</html>

<script>

function get_quiz_marks() {
              
              var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "index/get_all_questions",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                      "quiz_id": '<?php echo $quiz_id; ?>',
                  },
                  cache: false,
                  success: function(data, textStatus, jqXHR) {
                 
                 
                  

                       if (data.response == true) {
                           var total_marks = 0 ;
                           
                           
                                for (var i = 0; i < data.total_record; i++) {
                                      total_marks += parseInt(data.questions_all_record[i].question_marks);
                                }
                                $("#total_marks").html("Total Marks: " + total_marks);
                        } else {
                             $("#questions_list_div").html("<center><font color='red'><b>" + data.message + "</b></font></center>");

                      } 

                  }
              });
          }






 function refresh(){
  
  window.location.reload();
  
  }

$(document).keydown(function(event){
   event.preventDefault();

});



var Quiz_timer = "";

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
     Quiz_timer = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
            $("#btn_next_end_1").click();
        }
    }, 1000);
}
    
     

function start(){

  $('#quiz_name_div').hide();
  $('#quiz_qus').show();
  get_all_questions(<?php echo $quiz_id; ?>);
  
  num_of_question_response();
}

let question_no = 0;

function num_of_question_response(){

    var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "index/num_of_question_response",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                    'quiz_id': '<?php echo $quiz_id; ?>',
                    'student_id': '<?php echo $_SESSION["student_data"]["student_id"]; ?>' ,
                  },
                  cache: false,
                  success: function(data, textStatus, jqXHR) {
                       
                      if (data.response == true) {
                      
                          question_no = data.num_record ;
                          
                          question_no--;
                      }
                      
                  }
              });
   
}




 function get_all_questions(quiz_id) {
              $("#questions_list_div").html("<center><font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Loading...</b></font></center>");
              
              $("#question_img").html("");
              
              var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "index/get_questions",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                      "quiz_id": quiz_id
                  },
                  cache: false,
                  success: function(data, textStatus, jqXHR) {
                       
                                    

                     if (data.response == true) {
                     
                     console.log(data);
                     
                        var validImgExtensions = ['jpg','png','jpeg', 'gif', 'tiff'];
                        var validAudioExtensions = ['mp3','m4a','wav'];
                        
                       // clearInterval(Quiz_timer);
                        
                        //var question_time = data.questions_all_record[0].question_time ;
                        
                       // var fiveMinutes = 60 * question_time,
                        
                       // display = document.querySelector('#time');
                        
                        $("#question_number").html(data.n_of_aQ - data.n_of_uQ  + 1 );
                        
                      if(data.questions_all_record[0].question_text == "" ) { 
                      $("#question_name").hide();
                        }else{
                         $("#question_name").show();
                         $("#question_name").html(data.questions_all_record[0].question_text);
                      }
                      
                        
                       
                        if ( data.questions_all_record[0].question_img_extension != "" && data.questions_all_record[0].question_img_extension != null){
                              
                              if (validImgExtensions.includes(data.questions_all_record[0].question_img_extension)){
                              question_img = ' <img src="<?php echo base_url(); ?>quiz_img/question_img/'+data.questions_all_record[0].question_id+'.'+data.questions_all_record[0].question_img_extension+'" class="img-fluid" alt="Responsive image"> ';
                              $("#question_img").html(question_img);
                              }
                              else if (validAudioExtensions.includes(data.questions_all_record[0].question_img_extension)){
                              question_img = '<audio controls style="padding: 5px;" ><source src="<?php echo base_url(); ?>quiz_img/question_img/'+data.questions_all_record[0].question_id+'.'+data.questions_all_record[0].question_img_extension+'" type="audio/ogg">Your browser does not support the audio element.</audio> ';
                              $("#question_img").html(question_img);
                              }
                              
                              }
                        
                      
                      if(data.questions_all_record[0].question_description == "" ) { 
                      $("#description").hide();
                        }else{
                         $("#description").show();
                       $("#question_description").html(data.questions_all_record[0].question_description);
                      }
                      
                      $("#marks_for_this").html(data.questions_all_record[0].question_marks);
              
               if(data.questions_all_record[0].category_details.length){
                                $('#category_name').html(data.questions_all_record[0].category_details[0].category_name);
                              }
                      
                      
                      
                      
                       if(data.questions_all_record[0].question_details != false)
                                    {  var txt= "";
                                       for(var j = 0; j < data.questions_all_record[0].question_details.length; j++)
                                         {
                                         
         //(j + 1) data.questions_all_record[0].question_details[j].option_text+
                                txt += '<div class="col-sm-6">';         
                                txt += '<label class="pull-right lead fw-small" for="option_'+data.questions_all_record[0].question_details[j].trans_question_id+'">';
                                txt += '<input type="radio" name="student_ans" id="option_'+data.questions_all_record[0].question_details[j].trans_question_id+'" value="'+data.questions_all_record[0].question_details[j].trans_question_id+'" />';
                                txt += '&nbsp;<b> Option '+ (j + 1) +' :</b>';
                                txt += '&nbsp;<span id="option_1"> '+ data.questions_all_record[0].question_details[j].option_text +' </span>';
                                txt += '</label>';
                                txt += '<br><br>';
                                
                                 
                              
                              if ( data.questions_all_record[0].question_details[j].option_img_extension != null  ){
                                     if(validImgExtensions.includes(data.questions_all_record[0].question_details[j].option_img_extension)){
                                     txt += ' <img src="<?php echo base_url(); ?>quiz_img/option_img/'+data.questions_all_record[0].question_details[j].trans_question_id+'.'+data.questions_all_record[0].question_details[j].option_img_extension+'" class="img-fluid" alt="Option image"> ';
                                     }else if (validAudioExtensions.includes(data.questions_all_record[0].question_details[j].option_img_extension)){
                              txt += '<audio controls style="padding: 5px;"><source src="<?php echo base_url(); ?>quiz_img/option_img/'+data.questions_all_record[0].question_details[j].trans_question_id+'.'+data.questions_all_record[0].question_details[j].option_img_extension+'" type="audio/ogg">Your browser does not support the audio element.</audio> ';
                              }
                                     
                              
                              }
                                
                                txt += '</div>';
                                
                                
                                         }
                                $("#opt").html(txt);
                                    }
                                    
                        if(data.n_of_uQ == 1){ 
                        
                        $("#next_end").html('<a class="btn btn-success  ps-4 pe-4  me-3 " id="btn_next_end_1" onclick="Save_Next('+data.questions_all_record[0].question_id+',this,1);" > Submit </a>'); 
                        }else{
                           $("#next_end").html('<a class="btn btn-primary  ps-4 pe-4  me-3 btn_next_end " id="btn_next_end_1"  onclick="Save_Next('+data.questions_all_record[0].question_id+',this,0);" > Save & Next &raquo; </a>'); 
                        }
                        
                      } else {
                     
                         
                        $("#quiz_qus").html("<center><font color='red'><b>No Question Found.</b></font></center>");
                        
                      }
                  }
              });
          }
          
          

          
          
function Save_Next(question_id,obj,param){
  $('.error').hide();
  var trans_question_id = ($("input[type=radio][name='student_ans']:checked").length > 0)?$("input[type=radio][name='student_ans']:checked").val():0;
  
  if(question_id == 0 || question_id == "")
   {
    alert("Invalid Question ID.");
   } else if(trans_question_id == 0) {
   $(obj).before('<span class="error" style="color:red;"> Please Select Option. </span>');
   } else {
 
    $(obj).html("<i class='fa fa-spinner fa-spin'></i> Wait, Saving...");
    $(obj).prop("disabled" , true);
    
    var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "index/save_student_question_response",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                      'quiz_id': '<?php echo $quiz_id; ?>',
                      'student_id': '<?php echo $_SESSION["student_data"]["student_id"]; ?>' ,
                      'question_id': question_id ,
                      'trans_question_id' : trans_question_id,
                      'param': param 
                  },
                  cache: false,
                  success: function(data, textStatus, jqXHR) {
                           
                           if(data.response == true)
                            {
                             if(param == 0)
                              {
                                  question_no++ ;
  
                                  get_all_questions(<?php echo $quiz_id; ?>);
                              }
                             else
                              {
                                  alert("Your Quiz has been completed and your response has been saved successfully.");
                                  opener.location.reload();
                                  window.close();
                              }
                            }
                           else
                            {
                             alert(data.message);
                             
                             $(obj).html((param == 0)?"Save & Next &raquo;":"Submit");
                             $(obj).prop("disabled" , false);
                            }
                           
                  }
                });
   }
}


function get_quiz_details_by_id(quiz_id) {

              var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "index/get_quiz_details_by_id",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                      'quiz_id': quiz_id 
                  },
                  cache: false,
                  success: function(data, textStatus, jqXHR) {
                      
                      if (data.response == true) {
                      $("#quiz_name").html(data.all_record[0].quiz_name);
                      $("#quiz_de").html(data.all_record[0].quiz_description);
                      $("#quiz_in").html(data.all_record[0].quiz_instruction);

                      }

                  }
              });
          }


  
 get_quiz_details_by_id(<?php echo $quiz_id; ?>);
 
 
 
 
get_quiz_marks();





</script>
