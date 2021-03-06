<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	
	public function __construct()
	 {
	  parent::__construct();
	  
	  $_SESSION['page_start_time'] = microtime(true);
	 }
	
	
	
	
	
	public function index()
	{
	 if(isset($_SESSION['student_data']) && $_SESSION['student_data']['student_logged_status'] == TRUE)
	  {
	   redirect('index/home');
	   exit;
	   }
	 
	  $this->load->model("masters_m");
         $data['classes'] = $this->masters_m->get_all_class();
	  $this->load->view('web/pages/Student_register_Login', $data );
	 }
	 
	 
	 public function home()
	 {
	 
	 if(!isset($_SESSION['student_data']))
	  {
	    redirect('index');
	    exit;
	  }
	    $data = array();
	    $data["fname"] = $_SESSION["student_data"]["fname"] ;
	    $data["lname"] = $_SESSION["student_data"]["lname"] ;
	    $data["email"] = $_SESSION["student_data"]["email"] ;
	    $data["mobile"] = $_SESSION["student_data"]["mobile"] ;
	    $data["class_id"] = $_SESSION["student_data"]["class_id"] ;
	    $data["student_id"] = $_SESSION["student_data"]["student_id"] ;
	    $this->load->model("masters_m");
            $data['classes'] = $this->masters_m->get_all_class();
	    $data['subjects'] = $this->masters_m->get_all_subject();
	    
	    
	    $this->load->view('web/pages/Home' , $data);
	 }
	 
	 
	 
	 public function quiz_started($quiz_id,$enc)
	 {
	    if($quiz_id == "" || $enc == "" || $enc != sha1($quiz_id.MY_APP_KEY)){ redirect('index/student_logout'); }
	    
	    
	    
	    $data = array();
	    
	    if(!isset($_SESSION['student_data']))
	     {
	      redirect('index');
	      exit;
	     }
	    
	    $data["quiz_id"] =   $quiz_id;
	    
	   $this->load->view('web/pages/Quiz_started', $data);
	  
	 }
	 
	 
	 public function student_logout()
	 {
	  session_destroy();
	  redirect('index');
	 }
	 
	
	public function get_quiz_details_by_id()
            {
                $data = array();
                if ($this->input->is_ajax_request()) {
                    $quiz_id = (isset($_POST["quiz_id"])) ? $this->input->post("quiz_id", TRUE) : 0;
                    if ($quiz_id == 0 || trim($quiz_id) == "") {
                        $data["response"] = FALSE;
                        $data["message"] = "Invalid  Quiz ID.";
                    } else {
                        $this->load->model("quiz_m");
                        $r = $this->quiz_m->get_quiz_details_by_id($quiz_id);
                        if ($r != FALSE) {
                            $data["response"] = TRUE;
                            $data["message"] = count($r) . " Record Found.";
                            $data["total_record"] = count($r);
                            $data["all_record"] = $r;
                        } else {
                            $data["response"] = FALSE;
                            $data["message"] = "No Record Found.";
                        }
                    }
                }
                echo json_encode($data);
            }
	
        public function get_all_questions()
        {
                $data = array();
                        if ($this->input->is_ajax_request()) {
                        $quiz_id = (isset($_POST["quiz_id"])) ? $this->input->post("quiz_id", TRUE) : "";
                        $this->load->model("quiz_m");
                        $r = $this->quiz_m->get_all_questions($quiz_id);
                                if ($r != FALSE) {
                                        $data["response"] = TRUE;
                                        $data["message"] = count($r) . " Record Found.";
                                        $data["total_record"] = count($r);
                                        //$data["all_record"] = $r;
                                        $all_record = array();
                                        foreach($r as $rr)
                                                {
                                                $all_rec = array();
                                                $all_rec["question_id"] = $rr->question_id;
                                                $all_rec["question_text"] = $rr->question_text;
                                                $all_rec["question_description"] = $rr->question_description;
                                                $all_rec["question_type"] = $rr->question_type;
                                                $all_rec["question_time"] = $rr->question_time;
                                                $all_rec["question_marks"] = $rr->question_marks;
                                                $all_rec["question_negative_marks"] = $rr->question_negative_marks;
                                                $all_rec["question_details"] = $this->quiz_m->get_option_details_by_id($rr->question_id);
                                                $all_rec["question_img_extension"] = $rr->question_img_extension;
                                                $this->load->model("masters_m");
                  $all_rec["category_details"] = $this->masters_m->get_all_category_by_id($rr->category_id);
                                                $all_record[] = $all_rec;
                                        }
                                        $data["questions_all_record"] = $all_record;
                                } else {
                                        $data["response"] = FALSE;
                                        $data["message"] = "No Record Found.";
                                }
                        }
                echo json_encode($data);
        }
        
        public function get_questions()
        {
                $data = array();
                        if ($this->input->is_ajax_request()) {
                        $quiz_id = (isset($_POST["quiz_id"])) ? $this->input->post("quiz_id", TRUE) : "";
                        $student_id = $_SESSION["student_data"]["student_id"] ;
                        $this->load->model("quiz_m");
                        $n = $this->quiz_m->get_all_questions($quiz_id);
                        $data["n_of_aQ"] = count($n);
                        $r = $this->quiz_m->get_questions($quiz_id,$student_id);
                        $data["n_of_uQ"] = count($r);
                                if ($r != FALSE) {
                                        $data["response"] = TRUE;
                                        $data["message"] = count($r) . " Record Found.";
                                        $data["total_record"] = count($r);
                                        $data["all_record"] = $r;
                                        $all_record = array();
                                        foreach($r as $rr)
                                                {
                                                $all_rec = array();
                                                $all_rec["question_id"] = $rr->question_id;
                                                $all_rec["question_text"] = $rr->question_text;
                                                $all_rec["question_description"] = $rr->question_description;
                                                $all_rec["question_type"] = $rr->question_type;
                                                $all_rec["question_time"] = $rr->question_time;
                                                $all_rec["question_marks"] = $rr->question_marks;
                                                $all_rec["question_negative_marks"] = $rr->question_negative_marks;
                                                $all_rec["question_details"] = $this->quiz_m->get_option_details_by_id($rr->question_id);
                                                $all_rec["question_img_extension"] = $rr->question_img_extension;
                                                $this->load->model("masters_m");
                  $all_rec["category_details"] = $this->masters_m->get_all_category_by_id($rr->category_id);
                                                $all_record[] = $all_rec;
                                        }
                                        $data["questions_all_record"] = $all_record;
                                } else {
                                        $data["response"] = FALSE;
                                        $data["message"] = "No Record Found.";
                                }
                        }
                echo json_encode($data);
        }

	public function add_student_registration()
	{
	//fname lname scl_org_name address mobile email class dob gender password confirm_password
	
	  $data = array();
        if ($this->input->is_ajax_request()) {
            $fname = (isset($_POST["fname"])) ? $this->input->post("fname", TRUE) : "";
            $lname = (isset($_POST["lname"])) ? $this->input->post("lname", TRUE) : "";
            $mobile = (isset($_POST["mobile"])) ? $this->input->post("mobile", TRUE) : "";
            $email = (isset($_POST["email"])) ? $this->input->post("email", TRUE) : "";
            $class_id = (isset($_POST["class_id"])) ? $this->input->post("class_id", TRUE) : "";
            $password = (isset($_POST["password"])) ? $this->input->post("password", TRUE) : "";

            if (trim($fname) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter First name.";
            } else if (trim($lname) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter Last Name.";
            } else if (trim($mobile) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter Mobile.";
            }else if (trim($email) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter Email.";
            } else if (trim($class_id) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Choose Class.";
            }else if (trim($password) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter Password.";
            }else {
                
               $check_ar = array ("status" => 1 , "email" => $email);
               $this->load->model("quiz_m");
               $rr = $this->quiz_m->check_email_does_exists($check_ar);
               if ($rr == FALSE) {
              // fname lname scl_org_name address mobile email class dob gender password confirm_password
               
                    $insert_arr = array("fname" => $fname, "lname" => $lname, "mobile" => $mobile,"email"=> $email, "class_id" => $class_id,"password" => $password);
                    $this->load->model("quiz_m");
                    $r = $this->quiz_m->add_student_registration($insert_arr);
                    if ($r > 0) {
                    
                    $student_data = array("student_id"=>$r, "fname" => $fname , "lname" => $lname , "mobile" => $mobile , "email" => $email , "class_id" => $class_id ,  "student_logged_status" => TRUE);
	        
	        $_SESSION["student_data"] = $student_data;
                    
                    
                    
                        $data["response"] = TRUE;
                        $data["message"] = "Student Registered successfully.";
                    } else {
                        $data["response"] = FALSE;
                        $data["message"] = "Some error occured. Please try again later.";
                    }
                } else {
                    $data["response"] = FALSE;
                    $data["message"] = "This email already exists.";
                }
                }
                
            }
             echo json_encode($data);
        }
        
        
        public function validate_student_login()
        {
           $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $student_email = (isset($_POST["student_email"]))?$this->input->post("student_email" , TRUE):"";
	    $student_password = (isset($_POST["student_password"]))?$this->input->post("student_password" , TRUE):"";
	    if(trim($student_email) == "" || filter_var($student_email , FILTER_VALIDATE_EMAIL) == FALSE)
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your valid Email-ID.";
	     }
	    else if(trim($student_password) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your Password.";
	     }
	    else
	     {
	      $this->load->model("quiz_m");
	      $r = $this->quiz_m->validate_student_login($student_email , $student_password);
	      if($r != FALSE)
	       {
	       
	       //fname lname scl_org_name address mobile email class_id dob gender password confirm_password
	       
	        $student_data = array("student_id"=>$r[0]->student_id, "fname" => $r[0]->fname , "lname" => $r[0]->lname , "scl_org_name" => $r[0]->scl_org_name , "address" => $r[0]->address , "mobile" => $r[0]->mobile , "email" => $r[0]->email , "class_id" => $r[0]->class_id , "dob" => $r[0]->dob , "gender" => $r[0]->gender ,  "student_logged_status" => TRUE);
	        $_SESSION["student_data"] = $student_data;
	        
	        $data["response"] = TRUE;
	        $data["message"] = "Sign-In Successfully.";
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "Invalid Email-ID or Password.";
	       }
	     }
	   }
	  echo json_encode($data);
        }
        
        
         public function get_all_quiz()
    {
        $data = array();
        if ($this->input->is_ajax_request()) {
         
         $class_id = $_SESSION["student_data"]["class_id"];
         
            $this->load->model("quiz_m");
            $r = $this->quiz_m->get_quiz_by_class_id($class_id);
            if ($r != FALSE) {
                $data["response"] = TRUE;
                $data["message"] =  " Record Found.";
                $data["all_record"] = $r;
            } else {
               $data["response"] = FALSE;
                $data["message"] = "No Record Found.";
           }
        }
        echo json_encode($data);
    }
    
    public function get_all_quiz_r()
    {
        $data = array();
        if ($this->input->is_ajax_request()) {
         
         $class_id = $_SESSION["student_data"]["class_id"];
         
            $this->load->model("quiz_m");
            $r = $this->quiz_m->get_all_quiz_r($class_id);
            if ($r != FALSE) {
                $data["response"] = TRUE;
                $data["message"] =  " Record Found.";
                $data["all_record"] = $r;
            } else {
               $data["response"] = FALSE;
                $data["message"] = "No Record Found.";
           }
        }
        echo json_encode($data);
    }
    
    
    public function save_student_question_response()
     {
      $data = array();
      if($this->input->is_ajax_request())
       {
        $quiz_id = (isset($_POST["quiz_id"]))?$this->input->post("quiz_id" , TRUE):0;
        $student_id = (isset($_POST["student_id"]))?$this->input->post("student_id" , TRUE):0;
        $question_id = (isset($_POST["question_id"]))?$this->input->post("question_id" , TRUE):0;
        $trans_question_id = (isset($_POST["trans_question_id"]))?$this->input->post("trans_question_id" , TRUE):0;
        $param = $this->input->post("param" , TRUE);
        if($quiz_id == 0 || trim($quiz_id) == "")
         {
          $data["response"] = FALSE;
          $data["message"] = "Invalid Quiz ID";
         }
        else if($student_id == 0 || trim($student_id) == "")
         {
          $data["response"] = FALSE;
          $data["message"] = "Invalid Student ID";
         }
        else if($question_id == 0 || trim($question_id) == "")
         {
          $data["response"] = FALSE;
          $data["message"] = "Invalid Question ID";
         }
        else
         {
          $insert_array = array("quiz_id" => $quiz_id , "student_id" => $student_id , "question_id" => $question_id , "trans_question_id" => $trans_question_id , "eby" => $_SESSION["student_data"]["student_id"] , "eat" => date("Y-m-d H:i:s"));
          $this->load->model("quiz_m");
          $r = $this->quiz_m->save_student_question_response($insert_array);
          if($r > 0)
           {
           if($param == 1){
           $insert_array = array("quiz_id" => $quiz_id , "student_id" => $student_id , "eat" => date("Y-m-d H:i:s"));
            $this->quiz_m->quiz_completed($insert_array);
           }
            $data["response"] = TRUE;
            $data["message"] = "Student Response Saved Successfully.";
           }
          else
           {
            $data["response"] = FALSE;
            $data["message"] = "Some Error Occured. Please Try Again.";
           }
         }
       }
      echo json_encode($data);
     }
    
         public function num_of_question_response()
        {
                $data = array();
                if ($this->input->is_ajax_request()) {
                $quiz_id = (isset($_POST["quiz_id"])) ? $this->input->post("quiz_id", TRUE) : "";
                $student_id = (isset($_POST["student_id"])) ? $this->input->post("student_id", TRUE) : "";
                $this->load->model("quiz_m");
                $r = $this->quiz_m->num_of_question_response($quiz_id, $student_id);
                        if ($r != FALSE) {
                                $data["response"] = TRUE;
                                $data["message"] = " Record Found.";
                                $data["num_record"] = $r;
                        } else {
                                $data["response"] = FALSE;
                                $data["message"] = "No Record Found.";
                                $data["num_record"] = "";
                        }
                }
                echo json_encode($data);
        }
        
        public function get_student_quiz_result() {
        $data = array();
             if ($this->input->is_ajax_request()) {
             $quiz_id = (isset($_POST["quiz_id"])) ? $this->input->post("quiz_id", TRUE) : "";  
             $student_id = (isset($_POST["student_id"])) ? $this->input->post("student_id", TRUE) : "";
             
             $this->load->model("quiz_m");
             $r = $this->quiz_m->get_all_questions($quiz_id);
             if ($r != FALSE) {
                $data["response"] = TRUE;
                $data["message"] = count($r) . " Record Found.";
                $data["total_record"] = count($r);
                //$data["all_record"] = $r;
                $all_record = array();
              foreach($r as $rr)
                 {
                  $all_rec = array();
                  $all_rec["question_id"] = $rr->question_id;
                  $all_rec["question_text"] = $rr->question_text;
                  $all_rec["question_description"] = $rr->question_description;
                  $all_rec["question_type"] = $rr->question_type;
                  $all_rec["question_time"] = $rr->question_time;
                  $all_rec["question_marks"] = $rr->question_marks;
                  $all_rec["question_negative_marks"] = $rr->question_negative_marks;
                  $all_rec["question_img_extension"] = $rr->question_img_extension;
                  
                  $all_rec["question_details"] = $this->quiz_m->get_option_details_by_id($rr->question_id);
                  
                  $all_rec["student_response"] = $this->quiz_m->get_student_quiz_result($student_id , $quiz_id , $rr->question_id);
                  
                  $this->load->model("masters_m");
                  $all_rec["category_details"] = $this->masters_m->get_all_category_by_id($rr->category_id);
                  
                  $all_record[] = $all_rec;
                 }
                $data["questions_all_record"] = $all_record;
             } else {
                $data["response"] = FALSE;
                $data["message"] = "No Record Found.";
             }
             
             echo json_encode($data);           
        }
        }
        
        
        public function validate_change_password()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $student_id = (isset($_POST["student_id"]))?$this->input->post("student_id" , TRUE):0;
	    $old_password = (isset($_POST["old_password"]))?$this->input->post("old_password" , TRUE):"";
	    $new_password = (isset($_POST["new_password"]))?$this->input->post("new_password" , TRUE):"";
	    $renew_password = (isset($_POST["renew_password"]))?$this->input->post("renew_password" , TRUE):"";
	    if($student_id == 0 || trim($student_id) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Invalid Student-ID.";
	     }
	    else if(trim($old_password) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your old password.";
	     }
	    else if(trim($new_password) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter your new password.";
	     }
	    else if(trim($renew_password) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter again your new password.";
	     }
	    else if(trim($new_password) != trim($renew_password))
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Password not matched.";
	     }
	    else if(trim($old_password) == trim($renew_password))
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Old Password and new password should not be same.";
	     }
	    else
	     {
	      $this->load->model("quiz_m");
	      $r = $this->quiz_m->get_user_details_by_id($student_id);
	      if($r != FALSE)
	       {
	        if($r[0]->password == $old_password)
	         {
	          $update_arr = array("password" => $renew_password , "eby" => $_SESSION["student_data"]["student_id"] , "eat" => date("Y-m-d H:i:s"));
	          $r = $this->quiz_m->update_student_details($student_id , $update_arr);
	          if($r > 0)
	           {
	            unset($_SESSION["student_data"]);
	            $data["response"] = TRUE;
	            $data["message"] = "Password changed successfully.";
	           }
	          else
	           {
	            $data["response"] = FALSE;
	            $data["message"] = "Some error occured. Please try again later.";
	           }
	         }
	        else
	         {
	          $data["response"] = FALSE;
	          $data["message"] = "Invalid Old Password.";
	         }
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "Student Not Found.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
         
}



