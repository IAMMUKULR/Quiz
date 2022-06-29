  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>app/masters/classes">Classes</a></li>
              <li class="breadcrumb-item active">Subjects</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <h5 class="m-0">Subject</h5>
            </h3>
          </div>
          <div class="card-body">
            
            <div class="row">
             <div class="col-sm-3">
              
              <div class="form-group">
                <label for="subject_name">Subject name</label>
                <input type="text" class="form-control" id="subject_name" placeholder="Enter Subject." />
              </div>
              
              <div class="row">
                <div class="col-sm-12">
                  <button type="button" class="btn btn-primary" id="ar_btn" onclick="add_subject();">Submit</button>
                </div>
              </div>
              
              <div class="row"><div class="col-sm-12">&nbsp;</div></div>
              
              <div class="row">
                <div class="col-sm-12" id="err_msg">
                  &nbsp;
                </div>
              </div>
              
             </div>
             <div class="col-sm-9" id="subject_list_div">
               
             </div>
            </div>
            
          </div>
        </div>
        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <script>
   function delete_subject(subject_id)
    {
     var conf = confirm("Are you sure to delete this Subject?");
     if(conf == true)
      {
       var base_url = '<?php echo base_url(); ?>';
           $.ajax({
                   type: "POST",
                   dataType: "JSON",
                   url: base_url+"app/masters/delete_subject",
                   data: { '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>' , 'subject_id':subject_id },
                   cache: false,
                   success: function (data, textStatus, jqXHR) {

                            if(data.response == true)
                             {
                              get_all_subject();
                             }
                            else
                             {
                              alert(data.message);
                             }
                            
                   }
                 });
      }
    }
   
   
   function get_all_subject()
    {
     $("#class_list_div").html("<center><font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Loading...</b></font></center>");
     var base_url = '<?php echo base_url(); ?>';
         $.ajax({
                 type: "POST",
                 dataType: "JSON",
                 url: base_url+"app/masters/get_all_subject",
                 data: { '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>' },
                 cache: false,
                 success: function (data, textStatus, jqXHR) {
                

	                  if(data.response == true)
	                   {
	                    var txt = "<table class='table table-bordered table-sm'>";
	                     txt += "<thead>";
	                      txt += "<tr>";
	                       txt += "<th width='10%'>Sr.No.</th>";
	                       txt += "<th width='82%'>Subject Name</th>";
	                       txt += "<th width='8%'>Delete</th>";
	                      txt += "</tr>";
	                     txt += "</thead>";
	                     txt += "<tbody>";
	                      for(var i = 0; i < data.total_record; i++)
	                       {
	                        txt += "<tr>";
	                         txt += "<td>"+parseInt(i+1)+"</td>";
	                         txt += "<td>"+data.all_record[i].subject_name+"</td>";
	                         txt += "<td align='center'><i class='fa fa-times' style='color:red;cursor:pointer;cursor:hand;' onclick='delete_subject("+data.all_record[i].subject_id+");'></i></td>";
	                        txt += "</tr>";
	                       }
	                     txt += "</tbody>";
	                    txt += "</table>";
	                    $("#subject_list_div").html(txt);
	                   }
	                  else
	                   {
	                    $("#subjects_list_div").html("<center><font color='red'><b>"+data.message+"</b></font></center>");
	                   }
	                    
	         }
               });
    }
   
   
   function add_subject()
    {
     var subject_name = $("#subject_name").val();
     if(subject_name.replace(/ /gi , "") == "")
      {
       $("#subject_name").focus();
       $("#err_msg").html("<font color='red'><b>Enter Subject.</b></font>");
      }
     else
      {
       $("#ar_btn").prop("disabled" , true);
       $("#err_msg").html("<font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Validating...</b></font>");
       var base_url = '<?php echo base_url(); ?>';
           $.ajax({
                   type: "POST",
                   dataType: "JSON",
                   url: base_url+"app/masters/add_subject",
                   data: { '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>' , 'subject_name':subject_name },
                   cache: false,
                   success: function (data, textStatus, jqXHR) {
	                    
	                    if(data.response == true)
	                     {
	                      $("#err_msg").html("<font color='green'><b>"+data.message+"</b></font>");
	                      get_all_subject();
	                     subject_name = $("#subject_name").val("");
	                     }
	                    else
	                     {
	                      $("#err_msg").html("<font color='red'><b>"+data.message+"</b></font>");
	                     }
	                    $("#ar_btn").prop("disabled" , false);
	                    
	           }
                 });
      }
    }
   
   
   get_all_subject();
  </script>
