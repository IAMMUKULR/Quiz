  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Image and text -->
      <nav class="navbar navbar-light bg-dark">
          <a class="navbar-brand" style=" font-size:24px; ">
             <!-- <i width="30" style="margin-top: 10px;" height="30" class="d-inline-block align-top nav-icon fas fa-question-circle"></i>
               <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> -->
              Registered Students

              <!-- Button trigger modal 
              <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                  <i class="nav-icon fas fa-plus"></i>
                  New
              </button>-->

          </a>
      </nav>


             

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-12">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                          <li class="breadcrumb-item active">Registered Students</li>
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

      <div class="col-sm-12" style="height:500px;overflow-x:auto;" id="reg_students_list_div"></div>

<!--- add questions-->



      <script>
          //  function select


          //function get_all_registered_students()
          //get_all_quiz()

          function get_all_registered_students() {
              $("#reg_students_list_div").html("<center><font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Loading...</b></font></center>");
              var base_url = '<?php echo base_url(); ?>';
              $.ajax({
                  type: "POST",
                  dataType: "JSON",
                  url: base_url + "app/quiz/get_all_registered_students",
                  data: {
                      '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
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
                          txt += "<th width=''>Address</th>";
                          txt += "<th width=''>Mobile No.</th>";
                          txt += "<th width=''>Email</th>";
                          txt += "<th width=''>Class</th>";
                          txt += "<th width=''>Gender</th>";
                          txt += "<th width=''>DOB</th>";
                          txt += "<th width=''></th>";
                          txt += "</tr>";
                          txt += "</thead>";
                          txt += "<tbody>";
                          
                         
          
                          
                           for (var i = 0; i < data.total_record; i++) {
                          
                           
                              txt += "<tr>";
                              txt += "<td>" + parseInt(i + 1) + "</td>";
                              txt += "<td><a href='<?php echo base_url(); ?>app/quiz/attempted_quiz/"+data.all_record[i].student_id+"/"+ data.all_record[i].enc +"'  class='nav-link'>" + data.all_record[i].fname+" "+ data.all_record[i].lname +" </a></td>";
                              txt += "<td>" + data.all_record[i].scl_org_name + "</td>";
                              txt += "<td>" + data.all_record[i].address + "</td>";
                              txt += "<td>" + data.all_record[i].mobile+ "</td>";
                              txt += "<td>" + data.all_record[i].email+ "</td>";
                             
                             for(var j = 0; j < data.classes.length; j++)
	                       {
	                       
	                       if( data.classes[j].class_id == data.all_record[i].class_id  )
	                         {
	                          txt += "<td>" + data.classes[j].class_name + "</td>";
	                          }
	                       }
                             
                              txt += "<td>" + data.all_record[i].gender+ "</td>";
                              txt += "<td>" + data.all_record[i].dob+ "</td>";
                              txt += "<td><i class='fa fa-times' style='color:red;cursor:pointer;cursor:hand;' onclick='delete_registered_student(" + data.all_record[i].student_id + ");'></i></td>";

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


        //function questions()
        
        
         function delete_registered_student(student_id) {
              var conf = confirm("Are you sure to delete this Student record?");
              if (conf == true) {
                  var base_url = '<?php echo base_url(); ?>';
                  $.ajax({
                      type: "POST",
                      dataType: "JSON",
                      url: base_url + "app/quiz/delete_student",
                      data: {
                          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                          'student_id': student_id
                      },
                      cache: false,
                      success: function(data, textStatus, jqXHR) {
                          if (data.response == true) {
                              get_all_registered_students();
                          } else {
                              alert(data.message);
                          }

                      }
                  });
              }
          }
        

          get_all_registered_students();
      </script>

</div>
