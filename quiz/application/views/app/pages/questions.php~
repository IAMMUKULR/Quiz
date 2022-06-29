<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-dark">
        <a class="navbar-brand" style="font-size:24px;">
            <i width="30" style="margin-top: 10px;" height="30" class="d-inline-block align-top nav-icon fas fa-question-circle"></i>
            <!-- <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> -->
            Questions

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#add_new_question_modal">
                <i class="nav-icon fas fa-plus"></i>
                New
            </button>
        </a>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="add_new_question_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 70%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="staticBackdropLabel">Add New Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                <div class="row">
                   <div class="col-sm-6">
                            <label for="quiz_category_id" class="text-dark">Category</label>
                           <select class="form-control form-control-sm input-sm" id="quiz_category_id">
                                  <option value="" selected disabled>--select--</option>
                                  <?php
                                    foreach ($categories as $category) {
                                        echo  "<option value = " . $category->category_id . "> " . $category->category_name . "</option>";
                                    }
                                    ?>
                              </select>
                        </div>
                    </div>    
                    
                  <br />
                
                    <div class="row">
                    
                        <div class="col-sm-6">
                            <label for="question" class="text-dark">Question</label>
                            <textarea type="text" class="text-dark form-control form-control-sm" id="question" name="question" rows="5" placeholder="Enter Your Quiz Instruction."></textarea>
                            <div class="mb-3 mt-2">
                                 <input class="form-control form-control-sm"  id="question_pic" type="file">
                             </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="question_description" class="text-dark">Description</label>
                            <textarea type="text" class="text-dark form-control form-control-sm" id="question_description" name="question_description" rows="5" placeholder="Enter Your Quiz Instruction."></textarea>
                        </div>
                    </div>

                    <br />

                    <div class="row">
                        <div class="col-sm-2">
                            <label for="mcq"><input type="radio" name="q_type" id="mcq" value="1" checked onclick="manage_display_question_type(this.value);" />&nbsp;MCQ</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="true_false"><input type="radio" name="q_type" id="true_false" value="2" onclick="manage_display_question_type(this.value);" />&nbsp;True/False</label>
                        </div>
                    </div>

                    <br />

                    <div id="question_type_1">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="option_1">Option 1</label>
                                <textarea class="text-dark form-control form-control-sm" id="option_1" name="option_1" rows="5" placeholder="Enter Your Option 1."></textarea>
                                 <div class="mb-3 mt-2">
                                 <input class="form-control form-control-sm" id="option_1_pic" type="file">
                             </div>
                                <label class="pull-right" for="correct_option_1_1"><input type="radio" name="correct_option_1" id="correct_option_1_1" value="1" />&nbsp;Correct Option</label>
                            </div>
                            <div class="col-sm-6">
                                <label for="option_1">Option 2</label>
                                <textarea class="text-dark form-control form-control-sm" id="option_2" name="option_2" rows="5" placeholder="Enter Your Option 2."></textarea>
                                 <div class="mb-3 mt-2">
                                 <input class="form-control form-control-sm"  id="option_2_pic" type="file">
                             </div>
                                <label class="pull-right" for="correct_option_1_2"><input type="radio" name="correct_option_1" id="correct_option_1_2" value="2" />&nbsp;Correct Option</label>
                            </div>
                        </div>

                        <br />

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="option_3">Option 3</label>
                                <textarea class="text-dark form-control form-control-sm" id="option_3" name="option_3" rows="5" placeholder="Enter Your Option 3."></textarea>
                                 <div class="mb-3 mt-2">
                                 <input class="form-control form-control-sm"  id="option_3_pic" type="file">
                             </div>
                                <label class="pull-right" for="correct_option_1_3"><input type="radio" name="correct_option_1" id="correct_option_1_3" value="3" />&nbsp;Correct Option</label>
                            </div>
                            <div class="col-sm-6">
                                <label for="option_4">Option 4</label>
                                <textarea class="text-dark form-control form-control-sm" id="option_4" name="option_4" rows="5" placeholder="Enter Your Option 4."></textarea>
                                 <div class="mb-3 mt-2">
                                 <input class="form-control form-control-sm"  id="option_4_pic" type="file">
                             </div>
                                <label class="pull-right" for="correct_option_1_4"><input type="radio" name="correct_option_1" id="correct_option_1_4" value="4" />&nbsp;Correct Option</label>
                            </div>
                        </div>
                    </div>

                    <div id="question_type_2" style="display: none;">
                        <div class="row">
                            <div class="col-sm-2">
                                <label>TRUE</label>
                            </div>
                            <div class="col-sm-10">
                                <label class="pull-right" for="correct_option_2_1"><input type="radio" name="correct_option_2" id="correct_option_2_1" checked value="TRUE" />&nbsp;Correct Option</label>
                            </div>
                        </div>

                        <br />

                        <div class="row">
                            <div class="col-sm-2">
                                <label>FALSE</label>
                            </div>
                            <div class="col-sm-10">
                                <label class="pull-right" for="correct_option_2_2"><input type="radio" name="correct_option_2" id="correct_option_2_2" value="FALSE" />&nbsp;Correct Option</label>
                            </div>
                        </div>
                    </div>

                    <br />

                    <div class="row">
                        <!--<div class="col-sm-4">
                            <label for="question_time">Time</label>
                            <input type="number" id="question_time" class="form-control form-control-sm text-dark" placeholder="time in mins" />
                        </div>-->
                        <div class="col-sm-6">
                            <label for="question_marks">Marks</label>
                            <input type="number" id="question_marks" class="form-control form-control-sm text-dark" placeholder="marks" />
                        </div>
                        <div class="col-sm-6">
                            <label for="question_negative_marks">Negative Marks</label>
                            <input type="number" id="question_negative_marks" class="form-control form-control-sm text-dark" placeholder="negative marks" />
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="submit_btn" class="btn btn-success" onclick="add_question()">Submit</button>

                    <h6 style="margin-top: 1rem; margin-bottom: 1rem; text-align: center;">
                        <div class="col-sm-12" id="q_err_msg"></div>
                    </h6>
                </div>
            </div>
        </div>
    </div>

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

    <div class="row">
        <div class="col-sm-12" id="questions_list_div">
            <?php
       
      ?>
        </div>
    </div>

    <!-- Question_table-->
    <script>
    
        function manage_display_question_type(question_type) {
            $("#question_type_1").css("display", "none");
            $("#question_type_2").css("display", "none");

            $("#question_type_" + question_type).css("display", "block");
        }

        function add_question() {
            $("#q_err_msg").html("");
         

            var audioReg = /[\/.](mp3|m4a|wav)$/i;
            var imgReg = /[\/.](gif|jpg|jpeg|tiff|png)$/i;
            
            var mukul = false;
            
            var quiz_category_id = $("#quiz_category_id").val();
            var question = $("#question").val();
            var question_pic_val = $("#question_pic").val();
            var question_pic = $('#question_pic').prop('files')[0];
            var question_description = $("#question_description").val();
            
            var q_type = $("input[type=radio][name='q_type']:checked").val();
            
            var option_1 = $("#option_1").val();
            var option_2 = $("#option_2").val();
            var option_3 = $("#option_3").val();
            var option_4 = $("#option_4").val();
            var option_1_pic_val = $("#option_1_pic").val();
            var option_2_pic_val = $("#option_2_pic").val();
            var option_3_pic_val = $("#option_3_pic").val();
            var option_4_pic_val = $("#option_4_pic").val();
            var option_1_pic = $('#option_1_pic').prop('files')[0];
            var option_2_pic = $('#option_2_pic').prop('files')[0];
            var option_3_pic = $('#option_3_pic').prop('files')[0];
            var option_4_pic = $('#option_4_pic').prop('files')[0];
            
            var correct_option_1 = $("input[type=radio][name='correct_option_1']:checked").length;
            var correct_option_2 = $("input[type=radio][name='correct_option_2']:checked").length;
            
            var question_time = $("#question_time").val();
            var question_marks = $("#question_marks").val();
            var question_negative_marks = $("#question_negative_marks").val();
            
              if (quiz_category_id == null) {
                  $("#quiz_category_id").focus();
                  $("#q_err_msg").html("<font color='red'><b>Select Category.</b></font>");
              }else  if (question.replace(/ /gi, "") == "" && question_pic_val.replace(/ /gi , "") == "") {
                $("#question").focus();
                $("#q_err_msg").html("<font color='red'><b>Enter Question/Question Photo.</b></font>");
              } else if (!imgReg.test(question_pic_val) && !audioReg.test(question_pic_val)  && question_pic_val.replace(/ /gi , "") != "" ){
                $("#question_pic").focus();
                $("#q_err_msg").html("<font color='red'><b> Upload A valid Question Photo / Audio.</b></font>");
              }else if (q_type == 1) {
                if (option_1.replace(/ /gi, "") == "" && option_1_pic_val.replace(/ /gi , "") == "") {
                    $("#option_1").focus();
                    $("#q_err_msg").html("<font color='red'><b>Enter option 1/ option photo.</b></font>");
                } else if (!imgReg.test(option_1_pic_val) && !audioReg.test(option_1_pic_val)  && option_1_pic_val.replace(/ /gi , "") != "" ){
                    $("#option_1_pic").focus();
                    $("#q_err_msg").html("<font color='red'><b> Upload A valid option 1 Photo / Audio.</b></font>");
                } else if (option_2.replace(/ /gi, "") == "" && option_2_pic_val.replace(/ /gi , "") == "") {
                    $("#option_2").focus();
                    $("#q_err_msg").html("<font color='red'><b>Enter option 2/ option photo.</b></font>");
                } else if (!imgReg.test(option_2_pic_val) && !audioReg.test(option_2_pic_val)  && option_2_pic_val.replace(/ /gi , "") != "" ){
                    $("#option_2_pic").focus();
                    $("#q_err_msg").html("<font color='red'><b> Upload A valid option 2 Photo / Audio.</b></font>");
                }  else if (correct_option_1 === 0) {
                    $("#correct_option_1").focus();
                    $("#q_err_msg").html("<font color='red'><b>Select Correct Option.</b></font>");
                } else {
                    mukul = true;
                }
            } else if (q_type == 2) {
                if (correct_option_2 === 0) {
                    $("#correct_option_2").focus();
                    $("#q_err_msg").html("<font color='red'><b>Select Correct Option.</b></font>");
                } else {
                    mukul = true;
                }
            }

            if (mukul == true) {

                if /*(question_time == "") {
                    $("#question_time").focus();
                    $("#q_err_msg").html("<font color='red'><b>Enter question_time.</b></font>");
                } else if*/ (question_marks == "") {
                    $("#question_marks").focus();
                    $("#q_err_msg").html("<font color='red'><b>Enter question_marks.</b></font>");
                } else if (question_negative_marks == "") {
                    $("#question_negative_marks").focus();
                    $("#q_err_msg").html("<font color='red'><b>Enter question_negative_marks.</b></font>");
                }else {
                  
                  $("#submit_btn").prop("disabled", true);
                  $("#q_err_msg").html("<font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Validating...</b></font>");

                  var correct_option_1 = $("input[type=radio][name='correct_option_1']:checked").val();
                  var correct_option_2 = $("input[type=radio][name='correct_option_2']:checked").val();
                  
                  var form_data = new FormData();
                      form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>' , '<?php echo $this->security->get_csrf_hash(); ?>');
                      
                      form_data.append('quiz_id', '<?php echo $quiz_id; ?>');
                      form_data.append('quiz_category_id', quiz_category_id);
                      form_data.append('question_text', question);
                      form_data.append('question_description', question_description);
                      form_data.append('question_type', q_type);
                      //form_data.append('question_time', question_time);
                      form_data.append('question_marks', question_marks);
                      form_data.append('question_negative_marks', question_negative_marks);
                      form_data.append('option_1', option_1);
                      form_data.append('option_2', option_2);
                      form_data.append('option_3', option_3);
                      form_data.append('option_4', option_4);
                      form_data.append('option_5', 'TRUE');
                      form_data.append('option_6', 'FALSE');
                      form_data.append('correct_option_1', correct_option_1);
                      form_data.append('correct_option_2', correct_option_2);
                      
                      form_data.append('question_pic', question_pic);
                      form_data.append('option_1_pic', option_1_pic);
                      form_data.append('option_2_pic', option_2_pic);
                      form_data.append('option_3_pic', option_3_pic);
                      form_data.append('option_4_pic', option_4_pic);
                  
                  var base_url = '<?php echo base_url(); ?>';
                  $.ajax({
                      type: "POST",
                      dataType: "JSON",
                      url: base_url + "app/quiz/add_questions",
                      data: form_data,
                      cache: false,
                      contentType: false,
                      processData: false,
                      success: function(data, textStatus, jqXHR) {
                          
                          if (data.response == true) {

                           $("#quiz_category_id").val("");
                           $("#question").val("");
                           $("#question_description").val("");
                           $("#option_1").val("");
                           $("#option_2").val("");
                           $("#option_3").val("");
                           $("#option_4").val("");
                           $("input[type=radio][name='correct_option_1']:checked").prop("checked",false);
                           //$("#question_time").val("");
                           $("#question_marks").val("");
                           $("#question_negative_marks").val("");
                           $("#q_err_msg").html("<font color='green'><b>" + data.message + "</b></font>");
                           
                            $("#question_pic").val("");
                            $("#option_1_pic").val("");
                            $("#option_2_pic").val("");
                            $("#option_3_pic").val("");
                            $("#option_4_pic").val("");
                             
                             
                          
                           get_all_questions();
                           setTimeout(function(){    
                                
                                 $("#q_err_msg").html(""); }, 3000);
                          } else {
                              $("#q_err_msg").html("<font color='red'><b>" + data.message + "</b></font>");
                          }
                          $("#submit_btn").prop("disabled", false);

                      }
                  });
                 mukul = false;  }

            }
        }

    

        function get_all_questions() {
              $("#questions_list_div").html("<center><font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Loading...</b></font></center>");
              var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "app/quiz/get_all_questions",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                      "quiz_id": <?php echo $quiz_id; ?>
                  },
                  cache: false,
                  success: function(data, textStatus, jqXHR) {
                 
                
                  

                     if (data.response == true) {
                     
                          var validImgExtensions = ['jpg','png','jpeg', 'gif', 'tiff'];
                          var validAudioExtensions = ['mp3','m4a','wav'];
                          var txt = "";
                       
                         for (var i = 0; i < data.total_record; i++) {
                         

                              
                              txt += ' <div class="row card ml-2 mr-2" >  ';
                              txt += '<div class="list-group-item"> ';
                              txt += '<div class="col-12 "> ';
                              
                              txt += '<span style=" position: absolute; padding-left: 95%; color:red; "> <i class="fas fa-trash-alt"  onclick="delete_question(' + data.questions_all_record[i].question_id + ');"></i> </span>';
                              
                              if(data.questions_all_record[i].category_details.length){
                                txt += '<p> <b> Category Type : </b>'+ data.questions_all_record[i].category_details[0].category_name +'</p>'
                                
                                txt += '<hr>'
                                
                              }
                              
                              if (data.questions_all_record[i].question_description != "" ){
                              txt +=  '<p><B> Description: </b> '+  data.questions_all_record[i].question_description +' </p>';}
                              
                              txt +=  '<p> <B> Question: </b>'+  data.questions_all_record[i].question_text +' </p>';
                           
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
                                     txt +=  '<div class="col-sm-6 ">';
                                     txt +=  '<p>';

                                     var icon  = (data.questions_all_record[i].question_details[j].correct_option_status == 1) ?  '<i class="far fa-check-circle" style="color:green;" ></i>':  '<i class="far fa-times-circle" style="color:white;" ></i>';

                                     txt += icon;
                                     txt += '<b> Option'+( j + 1) +':</b> &nbsp; '+data.questions_all_record[i].question_details[j].option_text+'</p>';
                                     
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
                              txt +=  '<div class="row  ">';
                              txt +=  '<div class="col-sm-6">';
                              txt +=  '<p><b> Question Marks: </b>'+ data.questions_all_record[i].question_marks +'</p>';
                              txt +=  '</div>';
                              //txt +=  '<div class="col-sm-4">';
                              //txt +=  '<p><B> Question Time: </b>'+ data.questions_all_record[i].question_time +'</p>';
                              //txt +=  '</div>';
                              txt +=  '<div class="col-sm-6">';
                              txt +=  '<p><B> Question Negative Marks: </b>'+ data.questions_all_record[i].question_negative_marks +'</p>';
                              txt +=  '</div>';
                              txt +=  '</div>';
                              txt +=  '</div>';
                              txt +=  '</div>';
                              txt +=  '</div>';
                        }
                           $("#questions_list_div").html(txt);
                      } else {
                             $("#questions_list_div").html("<center><font color='red'><b>" + data.message + "</b></font></center>");

                      }

                  }
              });
          }
          
          function delete_question(question_id)
          {
          
           var conf = confirm("Are you sure to delete this Question?");
              if (conf == true){
             
              var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                      type: "POST",
                      dataType: "JSON",
                      url: base_url + "app/quiz/delete_question",
                      data: {

                          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                          "question_id":question_id
                         
                      },
                      cache: false,
                      success: function(data, textStatus, jqXHR) {
                        
                          if (data.response == true) {

                           $("#q_err_msg").html("<font color='green'><b>" + data.message + "</b></font>");
                             
                           get_all_questions();
                          } else {
                              $("#q_err_msg").html("<font color='red'><b>" + data.message + "</b></font>");
                          }
                          

                      }
                  });
          }
          }




          get_all_questions();
          // set tyme to start & delet quiz
          // result chart 
          //add audio
          //add categiry to add question
          
    </script>
</div>

