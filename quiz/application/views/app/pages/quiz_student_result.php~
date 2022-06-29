  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Image and text -->
      <nav class="navbar navbar-light bg-dark">
          <a class="navbar-brand" style="font-size:24px; ">
              <i width="30" style="margin-top: 10px;" height="30" class="d-inline-block align-top nav-icon fas fa-poll"></i>
            
             &nbsp; Quiz Result

          </a>
      </nav>




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

      <div class="col-sm-12" id="modal_list_div" style="height:500px;overflow-x:auto;"></div>

<!--- add questions-->



   




      <script>
      


          function get_quiz_details_by_id(quiz_id) {
              $("#edit_quiz_id").val(quiz_id);
              $("#edit_quiz_name").val("");
              $("#edit_quiz_description").val("");

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
                          txt += "<th width='%'>&nbsp; &nbsp; Sr.No.</th>";
                          txt += "<th width='%'>&nbsp; &nbsp; Quiz Name</th>";
                          txt += "<th width='%'>&nbsp; &nbsp; Description</th>";
                          txt += "<th width='%'>&nbsp;  &nbsp; Instruction</th>";
                          txt += "<th width='%'>&nbsp; Subject</th>";
                          txt += "<th width='%'>&nbsp; Classes</th>";
                          
                          txt += "</tr>";
                          txt += "</thead>";
                          txt += "<tbody>";
                          for (var i = 0; i < data.total_record; i++) {
                              txt += "<tr>";
                              txt += "<td>" + parseInt(i + 1) + "</td>";
                              txt += "<td><a href='<?php echo base_url(); ?>app/quiz/student_attempted_quiz_result/"+data.all_record[i].quiz_id+"/"+data.all_record[i].quiz_name+"/"+data.all_record[i].enc+"'  class='nav-link'>" + data.all_record[i].quiz_name +" </a></td>";
                              txt += "<td>" + data.all_record[i].quiz_description + "</td>";
                              txt += "<td>" + data.all_record[i].quiz_instruction + "</td>";
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
                             
                              txt += "</tr>";
                          }
                          txt += "</tbody>";
                          txt += "</table>";
                          $("#modal_list_div").html(txt);
                      } else {
                          $("#modal_list_div").html("<center><font color='red'><b>" + data.message + "</b></font></center>");
                      } 

                  }
              });
          }


        //function questions()

          get_all_quiz();
      </script>

</div>
