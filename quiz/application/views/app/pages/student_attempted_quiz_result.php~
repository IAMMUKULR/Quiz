<!-- Content Wrapper. Contains page content -->
<style>
    
    .modal-size{
          max-width:70%
    }
 
   @media(max-width:992px){
           .modal-size{
                 max-width:100%
            }
    }  
</style>

<div class="content-wrapper">
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-dark">
        <a class="navbar-brand" style="font-size: 24px;">
           <i width="30" style="margin-top: 10px;" height="30" class="d-inline-block align-top nav-icon fas fa-poll"></i> 
          &nbsp;<?php echo str_replace("%20"," ",$quiz_name); ?> Result

        </a>
    </nav>

   

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>app/quiz/quiz">Quiz</a></li>
                        <li class="breadcrumb-item active">Questions</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
     <!-- header --->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="my_quiz-tab" data-bs-toggle="tab" data-bs-target="#my_quiz" type="button" role="tab" aria-controls="my_quiz" aria-selected="true">Students Result</button>
                </li>
                <!--<li class="nav-item" role="presentation">
                        <button class="nav-link" id="my_result-tab" data-bs-toggle="tab" data-bs-target="#my_result" type="button" role="tab" aria-controls="my_result" aria-selected="false">My Result</button>
                </li>-->
        
        </ul>
        <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="my_quiz" role="tabpanel" aria-labelledby="my_quiz-tab">
                        <div class="pt-3"  id="quiz_list_div1"> 
                                 
                           <div class="col-sm-12" id="reg_students_list_div" style="height:500px;overflow-x:auto;"></div>
                        </div>
                </div>
                <div class="tab-pane fade" id="my_result" role="tabpanel" aria-labelledby="my_result-tab">
                        <div class="pt-3"  id="result_list_div2"> 
                                 <div class="container" id="student_list_div"> </div>
                        </div>
                </div>
          
        </div> 
    
    

<!-- Modal -->
    <div class="modal fade "  id="quiz_result_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-size"  role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="staticBackdropLabel">Result</h5>
                    <div> 
                     <button  class="btn btn-sm btn-outline-dark"  >
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







    <!-- Question_table-->
    <script>
        function get_all_questions_r(student_id) {
              
              var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "app/quiz/get_student_quiz_result",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                      "quiz_id": <?php echo $quiz_id; ?>,
                      "student_id": student_id
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
                         //  var una_q = 0;
                          
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
                              
                              
                              
                              txt +=  '<p> <B> Question '+q_n+' :  </b>'+  data.questions_all_record[i].question_text +' </p>';
                              
                              if ( data.questions_all_record[i].question_img_extension != "" && data.questions_all_record[i].question_img_extension != null){
                              
                              if (validImgExtensions.includes(data.questions_all_record[i].question_img_extension)){
                              txt += ' <img src="<?php echo base_url(); ?>quiz_img/question_img/'+data.questions_all_record[i].question_id+'.'+data.questions_all_record[i].question_img_extension+'" class="img-fluid" alt="Responsive image"> ';
                              }
                              else if (validAudioExtensions.includes(data.questions_all_record[i].question_img_extension)){
                              txt += '<audio controls style="padding: 10px; width: 270px;" ><source src="<?php echo base_url(); ?>quiz_img/question_img/'+data.questions_all_record[i].question_id+'.'+data.questions_all_record[i].question_img_extension+'" type="audio/ogg">Your browser does not support the audio element.</audio> ';
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
                                          
                                             txt +=  '<div class="col-md-6">';
                                             txt +=  '<p id="'+data.questions_all_record[i].question_details[j].trans_question_id+'">';

                                             var icon  = (data.questions_all_record[i].question_details[j].correct_option_status == 1) ?  '<i class="far fa-check-circle" style="color:green;" ></i>':  '<i class="far fa-times-circle" style="color:white;" ></i>';

                                             txt += icon;
                                             txt += '<span '+bgcol+'><b> Option '+( j + 1) +' :</b> &nbsp; '+data.questions_all_record[i].question_details[j].option_text+'</span></p>';
                                             
                                             if ( data.questions_all_record[i].question_details[j].option_img_extension != null  ){
                                     if(validImgExtensions.includes(data.questions_all_record[i].question_details[j].option_img_extension)){
                                     txt += ' <img src="<?php echo base_url(); ?>quiz_img/option_img/'+data.questions_all_record[i].question_details[j].trans_question_id+'.'+data.questions_all_record[i].question_details[j].option_img_extension+'" class="img-fluid" alt="Option image"> ';
                                     }else if (validAudioExtensions.includes(data.questions_all_record[i].question_details[j].option_img_extension)){
                              txt += '<audio controls style="padding: 10px; width: 270px;"><source src="<?php echo base_url(); ?>quiz_img/option_img/'+data.questions_all_record[i].question_details[j].trans_question_id+'.'+data.questions_all_record[i].question_details[j].option_img_extension+'" type="audio/ogg">Your browser does not support the audio element.</audio> ';
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
                        
                          // una_q = total_q -( right_a + wrong_a);,"Unattempted Questions",una_q, "#2F3E75" 
                           drawChart(right_a,wrong_a);
                         
                        
                        var q_r_u = ' <div class="row " >';
                              q_r_u +=    '<div class="text-dark col-md-4 col-sm-6"> total Question '+total_q+' </div> ';
                              q_r_u +=   ' <div class="text-success col-md-4 col-sm-6"> Right Question '+right_a+' </div>';
                              q_r_u +=     ' <div class="text-danger col-md-4 col-sm-6">Wrong Question '+wrong_a+' </div>';
                              //q_r_u +=      ' <div class="text-primary col-md-3 col-sm-6"> Unattempted Question '+una_q+' </div>'; 
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
                               
     
          function get_quiz_attempted_students_by_quiz_id() {
              $("#reg_students_list_div").html("<center><font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Loading...</b></font></center>");
              var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "app/quiz/get_quiz_attempted_students_by_quiz_id",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                      "quiz_id": <?php echo $quiz_id ; ?> 
                  },
                  cache: false,
                  success: function(data, textStatus, jqXHR) {

                     

                    if (data.response == true) {
                      
                          var txt = "<table class='table table-bordered table-sm' style='font-size:12px;'>";
                          txt += "<thead>";
                          txt += "<tr>";
                          txt += "<th width=''>Sr.No.</th>";
                          txt += "<th width=''>Student Name</th>";
                          txt += "<th width=''>School/Orginasition</th>";
                          txt += "<th width=''>Mobile No.</th>";
                          txt += "<th width=''>Email</th>";
                          txt += "<th width=''>Class</th>";
                          txt += "<th width=''>Gender</th>";
                          txt += "<th width=''>DOB</th>";
                          txt += "<th width=''>Action</th>";
                          txt += "</tr>";
                          txt += "</thead>";
                          txt += "<tbody>";
                          
                         
          
                          
                           for (var i = 0; i < data.total_record; i++) {
                           
                           
                              txt += "<tr>";
                              txt += "<td>" + parseInt(i + 1) + "</td>";
                              txt += "<td>" + data.all_record[i].fname+" "+ data.all_record[i].lname +"</td>";
                              txt += "<td>" + data.all_record[i].scl_org_name + "</td>";
                              txt += "<td>" + data.all_record[i].mobile+ "</td>";
                              txt += "<td>" + data.all_record[i].email+ "</td>";
                              
                              txt += "<td>";
                             for(var j = 0; j < data.classes.length; j++)
	                       {
	                       
	                       if( data.classes[j].class_id == data.all_record[i].class_id  )
	                         {
	                          txt += data.classes[j].class_name+"<br>";
	                          }
	                       }
	                       txt += "</td>"
                             
                              txt += "<td>" + data.all_record[i].gender+ "</td>";
                              txt += "<td>" + data.all_record[i].dob+ "</td>";
                              txt += '<td><button type="button" class="btn btn-sm btn-success result_btn" data-toggle="modal" data-target="#quiz_result_modal" id="login" onclick=get_all_questions_r('+data.all_record[i].student_id+')  > Result </button></td>';

                              txt += "</tr>";
                          } 
                          txt += "</tbody>";
                          txt += "</table>";
                          
                          $("#reg_students_list_div").html(txt);
                          
                      } else {
                          $("#reg_students_list_div").html("<center><font color='red'><b>" + data.message + "</b></font></center>");
                      } 
                  }
              });
          }




          get_quiz_attempted_students_by_quiz_id();

    </script>
</div>

