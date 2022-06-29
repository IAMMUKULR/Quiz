 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" > 

      <!-- Image and text -->
      <nav class="navbar navbar-light bg-dark">
          <a class="navbar-brand" style="font-size:24px; ">
              <i width="30" style="margin-top: 10px;" height="30" class="d-inline-block align-top nav-icon fas fa-question-circle"></i>
              <!-- <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> -->
              Quiz

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                  <i class="nav-icon fas fa-plus"></i>
                  New
              </button>

          </a>
      </nav>


              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title text-dark" id="staticBackdropLabel">Add New Quiz</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">

                              <h6><label for="quiz_name" class="text-dark ">Quiz Name</label> </h6>
                              <input type="text" class="form-control form-control-sm text-dark" name="quiz_name" id="quiz_name" placeholder="Enter Quiz Name." />
                              <h6 style=" margin-top: 1rem;">

                                  <div class="col-sm-12" id="name_err_msg"></div>
                              </h6>

                              <h6 style=" margin-top: 1rem;"> <label for="quiz_description" class="text-dark">Description</label> </h6>
                              <textarea type="text" class="text-dark form-control form-control-sm" id="quiz_description" name="quiz_description" rows="3" placeholder="Enter Your Quiz Description."></textarea>
                              <h6 style=" margin-top: 1rem;">
                                  <div class="col-sm-12" id="dsc_err_msg"></div>
                              </h6>

                              <h6 style=" margin-top: 1rem;"> <label for="quiz_instruction" class="text-dark">Instruction</label> </h6>
                              <textarea type="text" class="text-dark form-control form-control-sm" id="quiz_instruction" name="quiz_instruction" rows="3" placeholder="Enter Your Quiz Instruction."></textarea>
                              <h6 style=" margin-top: 1rem;">
                                  <div class="col-sm-12" id="inst_err_msg"></div>
                              </h6>

                              <h6 style=" margin-top: 1rem;"> <label for="quiz_subject_id" class="text-dark">Subject</label> </h6>
                              <select class="form-control input-sm" id="quiz_subject_id">
                                  <option selected disabled>--select--</option>
                                  <?php
                                    foreach ($subjects as $subject) {
                                        echo  "<option value = " . $subject->subject_id . "> " . $subject->subject_name . "</option>";
                                    }
                                    ?>
                              </select>
                              <h6 style=" margin-top: 1rem;">
                                  <div class="col-sm-12" id="sub_err_msg"></div>
                              </h6>

                              <h6 style=" margin-top: 1rem;"> <label for="quiz_subject_id" class="text-dark">Class</label> </h6>
                              <div class="row">
                                  <!-- <div class="col-sm-12"> -->
                                  <?php
                                    /*$c = 1;
                                    foreach ($classes as $class) {
                                        $css_class = $c % 4 == 0 ? "<br>" : "";
                                        echo "<div  class='form-check form-check-inline ' >
                                                  <input class='form-check-input ' type='checkbox' value=" . $class->class_id . " name='class_id[]'  >
                                                  <h6 class='text-dark'>     <label class='form-check-label' for='flexCheckChecked'>
                                                  " . $class->class_name . "
                                                  </label></h6>
                                                </div>" . $css_class . "";
                                        $c++;
                                    }*/

                                    ?>
                                    
                                    <?php
                            foreach ($classes as $class) {
                                
                                echo "<label for='class_id" . $class->class_id . "'>
                                        <input  type='checkbox' value=" . $class->class_id . " name='class_id[]' id='class_id" . $class->class_id . "' />
                                        &nbsp;
                                        " . $class->class_name . "
                                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            }

                            ?>
                                     <h6 style=" margin-top: 1rem;">
                                      <div class="col-sm-12" id="class_id_err_msg"></div>
                                     </h6>
                                  
                                    <div class="row">
                                        <div class="col-sm-6">
                                             <h6><label for="quiz_start_date" class="text-dark ">Quiz Start Date</label> </h6>
                                             <input type="date" class="form-control form-control-sm text-dark" name="quiz_start_date" id="quiz_start_date" placeholder="Enter Quiz start date." />
                                             <h6 style=" margin-top: 1rem;" class="">
                                                 <div class="col-sm-12" id="quiz_start_err_msg"></div>
                                              </h6>
                                         </div>
                                          
                                      
                                        <div class="col-sm-6">
                                             <h6><label for="quiz_end_date" class="text-dark ">Quiz End Date</label> </h6>
                                             <input type="date" class="form-control form-control-sm text-dark" name="quiz_end_date" id="quiz_end_date" placeholder="Enter Quiz end date." />
                                              <h6 style=" margin-top: 1rem;" class="">
                                                 <div class="col-sm-12" id="quiz_end_err_msg"></div>
                                              </h6>
                                             </div>
                                       
                                    </div>
                                    
                                 
                                  <!-- </div> -->

                              </div>

                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" id="add_btn" class="btn btn-success" onclick="add_quiz()">Add</button>
                          </div>
                          <h6 style=" margin-top: 1rem;  margin-bottom: 1rem; text-align: center; ">
                              <div class="col-sm-12" id="add_err_msg"></div>
                          </h6>
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
                          <li class="breadcrumb-item active">Quiz</li>
                      </ol>
                  </div>
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <div class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <p>Modal body text goes here.</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-primary">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-sm-12" style="height:500px;overflow-x:auto;" id="modal_list_div"></div>

<!--- add questions-->



      <!-- edit_quiz -->
      <div class="modal fade" id="edit_quiz_modal">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Edit Quiz</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">

                      <input type="hidden" id="edit_quiz_id" />

                      <h6><label for="quiz_name" class="text-dark ">Quiz Name</label> </h6>
                      <input type="text" class="form-control form-control-sm text-dark" name="edit_quiz_name" id="edit_quiz_name" placeholder="Enter Quiz Name." />
                      <h6 style=" margin-top: 1rem;">
                          <div class="col-sm-12" id="edit_name_err_msg"></div>
                      </h6>

                      <h6 style=" margin-top: 1rem;"> <label for="quiz_description" class="text-dark">Description</label> </h6>
                      <textarea type="text" class="text-dark form-control form-control-sm" id="edit_quiz_description" name="edit_quiz_description" rows="3" placeholder="Enter Your Quiz Description."></textarea>
                      <h6 style=" margin-top: 1rem;">
                          <div class="col-sm-12" id="edit_dsc_err_msg"></div>
                      </h6>
                      <h6 style=" margin-top: 1rem;"> <label for="edit_quiz_instruction" class="text-dark">Instruction</label> </h6>
                      <textarea type="text" class="text-dark form-control form-control-sm" id="edit_quiz_instruction" name="edit_quiz_instruction" rows="3" placeholder="Enter Your Quiz Instruction."></textarea>
                      <h6 style=" margin-top: 1rem;">
                          <div class="col-sm-12" id="edit_inst_err_msg"></div>
                      </h6>

                      <h6 style=" margin-top: 1rem;"> <label for="edit_quiz_subject_id" class="text-dark">Subject</label> </h6>
                      <select class="form-control input-sm" id="edit_quiz_subject_id">
                          <option selected disabled>--select--</option>
                          <?php
                            foreach ($subjects as $subject) {
                               echo  "<option value = " . $subject->subject_id . "> " . $subject->subject_name . "</option>";
                            }
                            ?>
                      </select>
                      <h6 style=" margin-top: 1rem;">
                          <div class="col-sm-12" id="edit_sub_err_msg"></div>
                      </h6>

                      <h6 style=" margin-top: 1rem;"> <label for="edit_quiz_subject_id" class="text-dark">Class</label> </h6>
                      <div class="row">
                          <!-- <div class="col-sm-12"> -->
                          <?php
                            foreach ($classes as $class) {
                                
                                echo "<label for='edit_class_id_" . $class->class_id . "'>
                                        <input  type='checkbox' value=" . $class->class_id . " name='edit_class_id[]' id='edit_class_id_" . $class->class_id . "' />
                                        &nbsp;
                                        " . $class->class_name . "
                                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            }

                            ?>
                          <h6 style=" margin-top: 1rem;">
                              <div class="col-sm-12" id="edit_class_id_err_msg"></div>
                          </h6>
                          <!-- </div> -->
                          
                          
                          <div class="row">
                                        <div class="col-sm-6">
                                             <h6><label for="edit_start_date" class="text-dark ">Quiz Start Date</label> </h6>
                                             <input type="date" class="form-control form-control-sm text-dark" name="edit_start_date" id="edit_start_date" placeholder="Enter Quiz start date." />
                                             <h6 style=" margin-top: 1rem;" class="">
                                                 <div class="col-sm-12" id="edit_start_err_msg"></div>
                                              </h6>
                                         </div>
                                          
                                      
                                        <div class="col-sm-6">
                                             <h6><label for="edit_end_date" class="text-dark ">Quiz End Date</label> </h6>
                                             <input type="date" class="form-control form-control-sm text-dark" name="edit_end_date" id="edit_end_date" placeholder="Enter Quiz end date." />
                                              <h6 style=" margin-top: 1rem;" class="">
                                                 <div class="col-sm-12" id="edit_end_err_msg"></div>
                                              </h6>
                                             </div>
                                       
                                    </div>

                      </div>

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" id="edit_btn" class="btn btn-success" onclick="edit_quiz()">Submit</button>
                  </div>
                  <h6 style=" margin-top: 1rem;  margin-bottom: 1rem; text-align: center; ">
                      <div class="col-sm-12" id="edit_err_msg"></div>
                  </h6>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




      <script>
      
      
      
      
      


          function edit_quiz() {
              $("#edit_name_err_msg").html("");
              $("#edit_dsc_err_msg").html("");
              $("#edit_err_msg").html("");
              $("#edit_inst_err_msg").html("");
              $("#edit_sub_err_msg").html("");
              $("#edit_class_id_err_msg").html("");
              $("#edit_start_err_msg").html("");
              $("#edit_end_err_msg").html("");

 
              var edit_quiz_id = $('#edit_quiz_id').val();
              var edit_quiz_name = $("#edit_quiz_name").val();
              var edit_quiz_description = $("#edit_quiz_description").val();
              var edit_quiz_instruction = $("#edit_quiz_instruction").val();
              var edit_quiz_subject_id = $("#edit_quiz_subject_id").val();
              var edit_quiz_classes_id = $("input[name='edit_class_id[]']:checked").length;
              
              var edit_start_date = $("#edit_start_date").val();
              var edit_end_date = $("#edit_end_date").val();
              

              if (edit_quiz_name.replace(/ /gi, "") == "") {
                  $("#edit_quiz_name").focus();
                  $("#edit_name_err_msg").html("<font color='red'><b>Enter quiz name.</b></font>");
              } else if (edit_quiz_description.replace(/ /gi, "") == "") {
                  $("#edit_quiz_description").focus();
                  $("#edit_dsc_err_msg").html("<font color='red'><b>Enter quiz description.</b></font>");
              } else if (edit_quiz_instruction.replace(/ /gi, "") == "") {
                  $("#edit_quiz_instruction").focus();
                  $("#edit_inst_err_msg").html("<font color='red'><b>Enter quiz instruction.</b></font>");
              } else if (edit_quiz_subject_id == null) {
                  $("#edit_quiz_subject_id").focus();
                  $("#edit_sub_err_msg").html("<font color='red'><b>Select Subject.</b></font>");
              } else if (edit_quiz_classes_id == 0) {
                  $("#edit_quiz_classes_id").focus();
                  $("#edit_class_id_err_msg").html("<font color='red'><b>Select classes.</b></font>");
              }else if (edit_start_date == "") {
                  $("#edit_start_date").focus();
                  $("#edit_start_err_msg").html("<font color='red'><b>Enter quiz start date.</b></font>");
              }else if (edit_end_date == "") {
                  $("#edit_end_date").focus();
                  $("#edit_end_err_msg").html("<font color='red'><b>Enter quiz end date.</b></font>");
              }else {
                  $("#edit_btn").prop("disabled", true);
                  $("#edit_err_msg").html("<font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Validating...</b></font>");
                  var base_url = '<?php echo base_url(); ?>';
                  var checked = []
                  $("input[name='edit_class_id[]']:checked").each(function() {
                      checked.push(parseInt($(this).val()));
                  });
                  var classes_id = checked.toString();
                 
                  $.ajax({
                      type: "POST",
                      dataType: "JSON",
                      url: base_url + "app/quiz/edit_quiz",
                      data: {
                          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                          'quiz_id': edit_quiz_id,
                          'quiz_name': edit_quiz_name,
                          'quiz_description': edit_quiz_description,
                          'quiz_instruction': edit_quiz_instruction,
                          'quiz_subject_id': edit_quiz_subject_id,
                          'quiz_classes_id': classes_id,
                          'quiz_start_date': edit_start_date,
                          'quiz_end_date': edit_end_date
                      },
                      cache: false,
                      success: function(data, textStatus, jqXHR) {

                          if (data.response == true) {
                              $("#edit_err_msg").html("<font color='green'><b>" + data.message + "</b></font>");
                              $("#eau_btn").prop("disabled", false);
                              
                               setTimeout(function(){ 
                                 $("#edit_err_msg").html(""); }, 3000);

                          } else {
                              $("#edit_err_msg").html("<font color='red'><b>" + data.message + "</b></font>");
                          }
                          $("#edit_btn").prop("disabled", false);
                          get_all_quiz();
                      }
                  });
              }
          }


          function add_quiz() {
              // var checkboxes = $('input:checkbox').length;
              $("#name_err_msg").html("");
              $("#dsc_err_msg").html("");
              $("#inst_err_msg").html("");
              $("#sub_err_msg").html("");
              $("#class_id_err_msg").html("");
              $("#add_err_msg").html("");
              $("#quiz_start_err_msg").html("");
              $("#quiz_end_err_msg").html("");

              var quiz_name = $("#quiz_name").val();
              var quiz_description = $("#quiz_description").val();
              var quiz_instruction = $("#quiz_instruction").val();
              var quiz_subject_id = $("#quiz_subject_id").val();
              var quiz_classes_id = $("input[name='class_id[]']:checked").length;
            

              var quiz_start_date = $("#quiz_start_date").val();
              var quiz_end_date = $("#quiz_end_date").val();

            


              if (quiz_name.replace(/ /gi, "") == "") {
                  $("#quiz_name").focus();
                  $("#name_err_msg").html("<font color='red'><b>Enter quiz name.</b></font>");
              } else if (quiz_description.replace(/ /gi, "") == "") {
                  $("#quiz_description").focus();
                  $("#dsc_err_msg").html("<font color='red'><b>Enter quiz description.</b></font>");
              } else if (quiz_instruction.replace(/ /gi, "") == "") {
                  $("#quiz_instruction").focus();
                  $("#inst_err_msg").html("<font color='red'><b>Enter quiz instruction.</b></font>");
              } else if (quiz_subject_id == null) {
                  $("#quiz_subject_id").focus();
                  $("#sub_err_msg").html("<font color='red'><b>Select Subject.</b></font>");
              } else if (quiz_classes_id == 0) {
                  $("#quiz_classes_id").focus();
                  $("#class_id_err_msg").html("<font color='red'><b>Select classes.</b></font>");
              }else if (quiz_start_date == "") {
                  $("#quiz_start_date").focus();
                  $("#quiz_start_err_msg").html("<font color='red'><b>Enter quiz start date.</b></font>");
              }else if (quiz_end_date == "") {
                  $("#quiz_end_date").focus();
                  $("#quiz_end_err_msg").html("<font color='red'><b>Enter quiz end date.</b></font>");
              } else {
                  $("#add_btn").prop("disabled", true);
                  $("#add_err_msg").html("<font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Validating...</b></font>");
                  var checked = []
                  $("input[name='class_id[]']:checked").each(function() {
                      checked.push(parseInt($(this).val()));
                  });
                  var classes_id = checked.toString();
                  var base_url = '<?php echo base_url(); ?>';
                  $.ajax({
                      type: "POST",
                      dataType: "JSON",
                      url: base_url + "app/quiz/add_quiz",
                      data: {
                          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                          'quiz_name': quiz_name,
                          'quiz_description': quiz_description,
                          'quiz_instruction': quiz_instruction,
                          'quiz_subject_id': quiz_subject_id,
                          'quiz_classes_id': classes_id,
                          'quiz_start_date': quiz_start_date,
                          'quiz_end_date': quiz_end_date
                          
                      },
                      cache: false,
                      success: function(data, textStatus, jqXHR) {

                          if (data.response == true) {

                              $("#quiz_name").val("");
                              $("#quiz_description").val("");
                              $("#quiz_instruction").val("");
                              $("input[type='checkbox'][name='class_id[]']").prop("checked",false);
                              $("#add_err_msg").html("<font color='green'><b>" + data.message + "</b></font>");
                              $("#quiz_subject_id").val(null);
                              $("#quiz_start_date").val("");
                              $("#quiz_end_date").val("");
                              get_all_quiz();
                                setTimeout(function(){    
                                 $("#add_err_msg").html(""); }, 3000);
                          } else {
                              $("#add_err_msg").html("<font color='red'><b>" + data.message + "</b></font>");
                          }
                          $("#add_btn").prop("disabled", false);

                      }
                  });
              }
          }

          function get_quiz_details_by_id(quiz_id) {
              $("#edit_quiz_id").val(quiz_id);
              $("#edit_quiz_name").val("");
              $("#edit_quiz_description").val("");
              $("#edit_start_date").val("");
              $("#edit_end_date").val("");

              var edit_class_id = $("input[type='checkbox'][name='edit_class_id[]']");
              for(var r = 0; r < edit_class_id.length; r++)
               {
                $("#edit_class_id_"+edit_class_id[r].value).prop("checked",false);
               }

              var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "app/quiz/get_quiz_details_by_id",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                      'quiz_id': quiz_id
                  },
                  cache: false,
                  success: function(data, textStatus, jqXHR) {
                     
                      if (data.response == true) {
                          $("#edit_quiz_id").val(data.all_record[0].quiz_id);
                          $("#edit_quiz_name").val(data.all_record[0].quiz_name);
                          $("#edit_quiz_description").val(data.all_record[0].quiz_description);
                          $("#edit_quiz_instruction").val(data.all_record[0].quiz_instruction);
                          $("#edit_quiz_subject_id").val(data.all_record[0].subject_id);
                          var classes_id = data.all_record[0].quiz_classes_id;
                          var checked = classes_id.split(",");
                          $("#edit_start_date").val(data.all_record[0].quiz_start_date);
                          $("#edit_end_date").val(data.all_record[0].quiz_end_date);
                         //   $("input[name='edit_class_id[]']:checked")
                          
                          for(var c = 0; c < checked.length; c++)
                           {
                            $("#edit_class_id_"+checked[c]).prop("checked",true);
                           }

                      }

                  }
              });
          }

          $('#myModal').on('shown.bs.modal', function() {
              $('#myInput').trigger('focus')
          })

          function delete_quiz(quiz_id) {
              var conf = confirm("Are you sure to delete this quiz?");
              if (conf == true) {
                  var base_url = '<?php echo base_url(); ?>';
                  $.ajax({
                      type: "POST",
                      dataType: "JSON",
                      url: base_url + "app/quiz/delete_quiz",
                      data: {
                          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                          'quiz_id': quiz_id
                      },
                      cache: false,
                      success: function(data, textStatus, jqXHR) {
                          if (data.response == true) {
                              get_all_quiz();
                          } else {
                              alert(data.message);
                          }

                      }
                  });
              }
          }

          function get_all_quiz() {
              $("#modal_list_div").html("<center><font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Loading...</b></font></center>");
              var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "app/quiz/get_all_quiz",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                  },
                  cache: false,
                  success: function(data, textStatus, jqXHR) {

                    

                     if (data.response == true) {
                          var txt = "<table class='table table-bordered table-sm' style='font-size:12px;'>";
                          txt += "<thead>";
                          txt += "<tr>";
                          txt += "<th width='%'> Sr.No.</th>";
                          txt += "<th width='%'>Quiz Name</th>";
                          txt += "<th width='%'> Description</th>";
                          txt += "<th width='%'> Instruction</th>";
                          txt += "<th width='%'> Quiz Date</th>";
                          txt += "<th width='%'> Subject</th>";
                          txt += "<th width='%'> Classes</th>";
                          txt += "<th width='%'> Status </th>";
                          txt += "<th width='%'>  Action</th>";
                          txt += "</tr>";
                          txt += "</thead>";
                          txt += "<tbody>";
                          for (var i = 0; i < data.total_record; i++) {
                              txt += "<tr>";
                              txt += "<td>" + parseInt(i + 1) + "</td>";
                              txt += "<td><a href='<?php echo base_url(); ?>app/quiz/questions/"+data.all_record[i].quiz_id+"/"+data.all_record[i].enc+"'  class='nav-link'>" + data.all_record[i].quiz_name +" </a></td>";
                              txt += "<td>" + data.all_record[i].quiz_description + "</td>";
                              txt += "<td>" + data.all_record[i].quiz_instruction + "</td>";
                              txt += "<td>" + data.all_record[i].quiz_start_date + " to "+ data.all_record[i].quiz_end_date +"</td>";
                              txt += "<td>" + data.all_record[i].subject_name+ "</td>";
                              txt += "<td>"; 
                               if(data.all_record[i].class_details != false)
                                {
                                 for(var j = 0; j < data.all_record[i].class_details.length; j++)
                                  {
                                   txt += data.all_record[i].class_details[j].class_name+"<br>"; 
                                  }
                                }
                              txt += "</td>";
                              
                               txt +="<td> <input "+ (data.all_record[i].quiz_status == "1" ? "checked" : "") +" onchange='quiz_status(this, " + data.all_record[i].quiz_id + " );'  class='toggle-check' data-size='sm' type='checkbox'  data-toggle='toggle' data-onstyle='success' data-offstyle='danger'>  </td>";
                              
                              txt += "<td align='center'><i class='fa fa-edit' style='color:#787c7c;cursor:pointer;cursor:hand;' title='Edit Quiz' data-toggle='modal' data-target='#edit_quiz_modal' onclick='get_quiz_details_by_id(" + data.all_record[i].quiz_id + ");'></i>";
                              txt += "&nbsp; &nbsp; ";
                              txt += "<i class='fa fa-times' style='color:red;cursor:pointer;cursor:hand;' onclick='delete_quiz(" + data.all_record[i].quiz_id + ");'></i> </td>"
                              
                              txt += "</tr>";
                          }
                          txt += "</tbody>";
                          txt += "</table>";
                          $("#modal_list_div").html(txt);
                          
                          $('.toggle-check').bootstrapToggle({
                              on: 'On',
                              off: 'Off'
                            });
                          
                      } else {
                          $("#modal_list_div").html("<center><font color='red'><b>" + data.message + "</b></font></center>");
                      } 

                  }
              });
          }

     function quiz_status(status, quiz_id){
                  var base_url = '<?php echo base_url(); ?>';
                  $.ajax({
                      type: "POST",
                      dataType: "JSON",
                      url: base_url + "app/quiz/change_quiz_status",
                      data: {
                          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                          'quiz_id': quiz_id,
                          'quiz_status': ( status.checked ? 1 : 0)
                      },
                      cache: false,
                      success: function(data, textStatus, jqXHR) {
                         if (data.response == true) {
                             
                         } else {
                              alert(data.message);
                         }

                      }
                  });
     } 

       

          get_all_quiz();
      </script>

</div>
