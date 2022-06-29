<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Quiz  extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        if (!isset($_SESSION['userdata']) || $_SESSION['userdata']['user_logged_status'] != TRUE) {
            redirect('app/logout');
            
        }
        $_SESSION['page_start_time'] = microtime(true);
    }


    public function quiz($page = "quiz")
    {
        if (!file_exists(APPPATH . 'views/app/pages/' . $page . '.php')) {
            show_404();
        }

        $data = array();

        $data["title"] = "Quiz";

        $this->load->model("masters_m");
        $data['classes'] = $this->masters_m->get_all_class();
        $data['subjects'] = $this->masters_m->get_all_subject();

        $this->load->view('app/templates/header', $data);
        $this->load->view('app/templates/side_panel', $data);
        $this->load->view('app/pages/' . $page, $data);
        $this->load->view('app/templates/footer', $data);
    }
    
    
    
      public function student_registered($page = "Student_Registered")
    {
        if (!file_exists(APPPATH . 'views/app/pages/' . $page . '.php')) {
            show_404();
        }

        $data = array();

        $data["title"] = "Student_Registered";

       /* $this->load->model("masters_m");
        $data['classes'] = $this->masters_m->get_all_class();
        $data['subjects'] = $this->masters_m->get_all_subject();*/

        $this->load->view('app/templates/header', $data);
        $this->load->view('app/templates/side_panel', $data);
        $this->load->view('app/pages/' . $page, $data);
        $this->load->view('app/templates/footer', $data);
    }
    
    

    public function get_all_quiz()
    {
        $data = array();
        if ($this->input->is_ajax_request()) {
            $this->load->model("quiz_m");
            $r = $this->quiz_m->get_all_quiz();
            if ($r != FALSE) {
                $data["response"] = TRUE;
                $data["message"] = count($r) . " Record Found.";
                $data["total_record"] = count($r);
                //$data["all_record"] = $r;
                $all_record = array();
                foreach($r as $rr)
                 {
                  $all_rec = array();
                  
                  $all_rec["quiz_id"] = $rr->quiz_id;
                  $all_rec["quiz_name"] = $rr->quiz_name;
                  $all_rec["quiz_description"] = $rr->quiz_description;
                  $all_rec["quiz_instruction"] = $rr->quiz_instruction;
                  $all_rec["subject_name"] = $rr->subject_name;
                  $all_rec["quiz_classes_id"] = $rr->quiz_classes_id;
                  $all_rec["quiz_status"] = $rr->quiz_status;
                  $all_rec["quiz_start_date"] = $rr->quiz_start_date;
                  $all_rec["quiz_end_date"] = $rr->quiz_end_date;
                  
                  $all_rec["enc"] = sha1($rr->quiz_id.MY_APP_KEY);
                  
                  $all_rec["class_details"] = $this->quiz_m->get_class_details_by_id($rr->quiz_classes_id);
                  
                  $all_record[] = $all_rec;
                 }
                $data["all_record"] = $all_record;
            } else {
                $data["response"] = FALSE;
                $data["message"] = "No Record Found.";
            }
        }
        echo json_encode($data);
    }
    
    
    public function get_all_registered_students()
    {
        $data = array();
        if ($this->input->is_ajax_request()) {
            $this->load->model("quiz_m");
            $r = $this->quiz_m->get_all_registered_students();
            $this->load->model("masters_m");
            $data['classes'] = $this->masters_m->get_all_class();
            if ($r != FALSE) {
                $data["response"] = TRUE;
                $data["message"] = count($r) . " Record Found.";
                $data["total_record"] = count($r);
                //$data["all_record"] = $r;
                $all_record = array();
                foreach($r as $rr)
                 {
                  $all_rec = array();
                  
                  $all_rec["student_id"] = $rr->student_id;
                  $all_rec["fname"] = $rr->fname;
                  $all_rec["lname"] = $rr->lname;
                  $all_rec["scl_org_name"] = $rr->scl_org_name;
                  $all_rec["address"] = $rr->address;
                  $all_rec["mobile"] = $rr->mobile;
                  $all_rec["email"] = $rr->email;
                  $all_rec["class_id"] = $rr->class_id;
                  $all_rec["dob"] = $rr->dob;
                  $all_rec["gender"] = $rr->gender;
                  
                  $all_rec["enc"] = sha1($rr->student_id.MY_APP_KEY);
                  
                  
                  
                  $all_record[] = $all_rec;
                 }
                $data["all_record"] = $all_record;
            
            } else {
                $data["response"] = FALSE;
                $data["message"] = "No Record Found.";
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
                  $all_rec["category_id"] = $rr->category_id;
                  $all_rec["question_text"] = $rr->question_text;
                  $all_rec["question_description"] = $rr->question_description;
                  $all_rec["question_type"] = $rr->question_type;
                  $all_rec["question_time"] = $rr->question_time;
                  $all_rec["question_marks"] = $rr->question_marks;
                  $all_rec["question_negative_marks"] = $rr->question_negative_marks;
                  $all_rec["question_img_extension"] = $rr->question_img_extension;
                  
               //   $all_rec["enc"] = sha1($rr->quiz_id.MY_APP_KEY);
                
       
                  
                  $all_rec["question_details"] = $this->quiz_m->get_option_details_by_id($rr->question_id);
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
    
    

    public function add_quiz()
    {
        $data = array();
        if ($this->input->is_ajax_request()) {
            $quiz_name = (isset($_POST["quiz_name"])) ? $this->input->post("quiz_name", TRUE) : "";
            $quiz_description = (isset($_POST["quiz_description"])) ? $this->input->post("quiz_description", TRUE) : "";
            $quiz_instruction = (isset($_POST["quiz_instruction"])) ? $this->input->post("quiz_instruction", TRUE) : "";
            $quiz_subject_id = (isset($_POST["quiz_subject_id"])) ? $this->input->post("quiz_subject_id", TRUE) : "";
            $quiz_classes_id = (isset($_POST["quiz_classes_id"])) ? $this->input->post("quiz_classes_id", TRUE) : "";
            $quiz_start_date = (isset($_POST["quiz_start_date"])) ? $this->input->post("quiz_start_date", TRUE) : "";
            $quiz_end_date = (isset($_POST["quiz_end_date"])) ? $this->input->post("quiz_end_date", TRUE) : "";

            if (trim($quiz_name) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter quiz name.";
            } else if (trim($quiz_description) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter description.";
            } else if (trim($quiz_instruction) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter instruction.";
            } else if (trim($quiz_subject_id) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Select subject.";
            }else if (trim($quiz_classes_id) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Choose Class.";
            }else if (trim($quiz_start_date) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Select Quiz Start Date.";
            }else if (trim($quiz_end_date) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Select Quiz End Date.";
            }else { 
                $this->load->model("quiz_m");
                $check_ar = array ("status" => 1 , "quiz_name" => $quiz_name);
                $r = $this->quiz_m->check_quiz_exists($check_ar);
                if ($r == FALSE) {
                    $insert_arr = array("quiz_name" => $quiz_name, "quiz_description" => $quiz_description, "quiz_instruction" => $quiz_instruction,  "subject_id"=> $quiz_subject_id, "quiz_classes_id" => $quiz_classes_id,"quiz_start_date" => $quiz_start_date,"quiz_end_date" => $quiz_end_date, "eby" => $_SESSION["userdata"]["user_id"], "eat" => date("Y-m-d H:i:s"));
                    $r = $this->quiz_m->add_quiz($insert_arr);
                    if ($r > 0) {
                        $data["response"] = TRUE;
                        $data["message"] = "Quiz added successfully.";
                    } else {
                        $data["response"] = FALSE;
                        $data["message"] = "Some error occured. Please try again later.";
                    }
                } else {
                    $data["response"] = FALSE;
                    $data["message"] = "This Quiz already exists.";
                }
            }
        }
        echo json_encode($data);
    }

    public function delete_quiz()
    {
        $data = array();
        if ($this->input->is_ajax_request()) {
            $quiz_id = (isset($_POST["quiz_id"])) ? $this->input->post("quiz_id", TRUE) : 0;
            if ($quiz_id == 0 || trim($quiz_id) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Invalid Quiz ID.";
            } else {
                $this->load->model("quiz_m");

                $update_arr = array("status" => 0, "eby" => $_SESSION["userdata"]["user_id"], "eat" => date("Y-m-d H:i:s"));
                $r = $this->quiz_m->update_quiz($quiz_id, $update_arr);
                if ($r > 0) {
                    $data["response"] = TRUE;
                    $data["message"] = "Quiz deleted successfully.";
                } else {
                    $data["response"] = FALSE;
                    $data["message"] = "Some error occured. Please try again later.";
                }
            }
        }
        echo json_encode($data);
    }

 public function change_quiz_status()
    {
        $data = array();
        if ($this->input->is_ajax_request()) {
            $quiz_id = (isset($_POST["quiz_id"])) ? $this->input->post("quiz_id", TRUE) : 0;
            $quiz_status = (isset($_POST["quiz_status"])) ? $this->input->post("quiz_status", TRUE) : "";
            if ($quiz_id == 0 || trim($quiz_id) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Invalid Quiz ID.";
            } else if ( $quiz_status == "" ){
                $data["response"] = FALSE;
                $data["message"] = "Invalid Quiz Status."; 
            }else {
                $this->load->model("quiz_m");

                $update_arr = array("quiz_status" => $quiz_status, "eby" => $_SESSION["userdata"]["user_id"], "eat" => date("Y-m-d H:i:s"));
                $r = $this->quiz_m->update_quiz($quiz_id, $update_arr);
                if ($r > 0) {
                    $data["response"] = TRUE;
                    $data["message"] = "Quiz status successfully.";
                } else {
                    $data["response"] = FALSE;
                    $data["message"] = "Some error occured. Please try again later.";
                }
            }
        }
        echo json_encode($data);
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

    public function edit_quiz()
    {
        $data = array();
        if ($this->input->is_ajax_request()) {
            $quiz_id = (isset($_POST["quiz_id"])) ? $this->input->post("quiz_id", TRUE) : 0;
            $quiz_name = (isset($_POST["quiz_name"])) ? $this->input->post("quiz_name", TRUE) : "";
            $quiz_description = (isset($_POST["quiz_description"])) ? $this->input->post("quiz_description", TRUE) : "";
            $quiz_instruction = (isset($_POST["quiz_instruction"])) ? $this->input->post("quiz_instruction", TRUE) : "";
            $quiz_subject_id = (isset($_POST["quiz_subject_id"])) ? $this->input->post("quiz_subject_id", TRUE) : "";
            $quiz_classes_id = (isset($_POST["quiz_classes_id"])) ? $this->input->post("quiz_classes_id", TRUE) : "";
            $quiz_start_date = (isset($_POST["quiz_start_date"])) ? $this->input->post("quiz_start_date", TRUE) : "";
            $quiz_end_date = (isset($_POST["quiz_end_date"])) ? $this->input->post("quiz_end_date", TRUE) : "";
            if ($quiz_id == 0 || trim($quiz_id) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Invalid Quiz-ID.";
            } else if ($quiz_name == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter your quiz name.";
            } else if (trim($quiz_description) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter your quiz description.";
            }else if (trim($quiz_instruction) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter instruction.";
            } else if (trim($quiz_subject_id) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Select subject.";
            }else if (trim($quiz_classes_id) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Choose class.";
            }else if (trim($quiz_start_date) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Select Quiz Start Date.";
            }else if (trim($quiz_end_date) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Select Quiz End Date.";
            } else {
                $this->load->model("quiz_m");
                $check_ar = array ("status" => 1 , "quiz_name" => $quiz_name , "quiz_id!=" => $quiz_id);
                $r = $this->quiz_m->check_quiz_exists($check_ar);
                if ($r == FALSE) {
                    $update_arr = array("quiz_id" => $quiz_id, "quiz_name" => $quiz_name, "quiz_description" => $quiz_description, "quiz_instruction" => $quiz_instruction, "subject_id"=> $quiz_subject_id,"quiz_classes_id" => $quiz_classes_id, "quiz_start_date" => $quiz_start_date,"quiz_end_date" => $quiz_end_date, "eby" => $_SESSION["userdata"]["user_id"], "eat" => date("Y-m-d H:i:s"));
                    $r = $this->quiz_m->update_quiz($quiz_id, $update_arr);
                    if ($r > 0) {
                        $data["response"] = TRUE;
                        $data["message"] = "User profile updated successfully.";
                    } else {
                        $data["response"] = FALSE;
                        $data["message"] = "Some error occured. Please try again later.";
                    }
                } else {
                    $data["response"] = FALSE;
                    $data["message"] = "This Quiz is already exists. Try with other Quiz.";
                }
            }
        }
        echo json_encode($data);
    }
    
    public function questions($quiz_id = "" , $enc = "" , $page = 'questions')
    {
       if($quiz_id == "" || $enc == "" || $enc != sha1($quiz_id.MY_APP_KEY)){ redirect('app/logout'); exit; }
       
       if (!file_exists(APPPATH . 'views/app/pages/' . $page . '.php')) {
            show_404();
        }

        $data = array();
        $data["quiz_id"] = $quiz_id;
        $data["title"] = "Question";
        $this->load->model("masters_m");
        $data["categories"] = $this->masters_m->get_all_category();
        
         

        $this->load->view('app/templates/header', $data);
        $this->load->view('app/templates/side_panel', $data);
        $this->load->view('app/pages/' . $page, $data);
        $this->load->view('app/templates/footer', $data);
    }
    
    public function attempted_quiz($student_id = "" , $enc = "" , $page = 'attempted_quiz')
    {
       if($student_id == "" || $enc == "" || $enc != sha1($student_id.MY_APP_KEY)){ redirect('app/logout'); exit; }
       
       if (!file_exists(APPPATH . 'views/app/pages/' . $page . '.php')) {
            show_404();
        }

        $data = array();
        $data["title"] = "Attempted Quiz";
        $data["student_id"] = $student_id;
       
        
        

       $this->load->view('app/templates/header', $data);
        $this->load->view('app/templates/side_panel', $data);
        $this->load->view('app/pages/' . $page, $data);
        $this->load->view('app/templates/footer', $data);
    }
    
    public function student_attempted_quiz_result($quiz_id = "" ,$quiz_name="" , $enc = "" , $page = 'student_attempted_quiz_result')
    {
       if($quiz_id == "" || $quiz_name=="" || $enc == "" || $enc != sha1($quiz_id.MY_APP_KEY)){ redirect('app/logout'); exit; }
       
       if (!file_exists(APPPATH . 'views/app/pages/' . $page . '.php')) {
            show_404();
        }

        $data = array();
        $data["title"] = 'Quiz Result';
        $data["quiz_id"] = $quiz_id;
         $data["quiz_name"] = $quiz_name;
       
        
        $this->load->view('app/templates/header', $data);
        $this->load->view('app/templates/side_panel', $data);
        $this->load->view('app/pages/' . $page, $data);
        $this->load->view('app/templates/footer', $data);
    }
   
    
    
    public function add_questions(){
    $data = array();
    
        if ($this->input->is_ajax_request()) {
            $option_count = 4;
            $mukul = "FALSE";
         
            $quiz_id = (isset($_POST["quiz_id"])) ? $this->input->post("quiz_id", TRUE) : "";
            $category_id = (isset($_POST["quiz_category_id"])) ? $this->input->post("quiz_category_id", TRUE) : "";
            $question_text = (isset($_POST["question_text"])) ? $this->input->post("question_text", TRUE) : "";
            $question_description = (isset($_POST["question_description"])) ? $this->input->post("question_description", TRUE) : "";
            $question_type = (isset($_POST["question_type"])) ? $this->input->post("question_type", TRUE) : "";
            //$question_time = (isset($_POST["question_time"])) ? $this->input->post("question_time", TRUE) : "";
            $question_marks = (isset($_POST["question_marks"])) ? $this->input->post("question_marks", TRUE) : "";
            $question_negative_marks = (isset($_POST["question_negative_marks"])) ? $this->input->post("question_negative_marks", TRUE) : "";
             $option_1 = (isset($_POST["option_1"])) ? $this->input->post("option_1", TRUE) : "";
             $option_2 = (isset($_POST["option_2"])) ? $this->input->post("option_2", TRUE) : "";
             $option_3 = (isset($_POST["option_3"])) ? $this->input->post("option_3", TRUE) : "";
             $option_4 = (isset($_POST["option_4"])) ? $this->input->post("option_4", TRUE) : "";
             $correct_option_1 = (isset($_POST["correct_option_1"])) ? $this->input->post("correct_option_1", TRUE) : "";
             $correct_option_2 = (isset($_POST["correct_option_2"])) ? $this->input->post("correct_option_2", TRUE) : "";
           
           if ( trim($option_3) == "" && empty($_FILES['option_3_pic']['name'])  ){
           $option_count =  2;
           } else if (trim($option_4) == "" && empty($_FILES['option_4_pic']['name']) ){
           $option_count =  3;
           }
           
           
           
           
            if (trim($category_id) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Select Category Type.";
            } else if (trim($question_text) == "" && !isset($_FILES['question_pic']['name'])) {
                $data["response"] = FALSE;
                $data["message"] = "Enter Question / Upload Question image. ";
            } else if (trim($question_type) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Select Question Type.";
            } /*else if (trim($question_time) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter Question Time.";
            }*/ else if (trim($question_marks) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter Question Marks.";
            }else if (trim($question_negative_marks) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter Question Negative Marks.";
            }else if (trim($question_type) == 1) {
                        if (trim($option_1) == "" && empty($_FILES['option_1_pic']['name']) ) {
                            $data["response"] = FALSE;
                            $data["message"] = "Enter option_1/ upload option image.";
                        }else if (trim($option_2) == "" && empty($_FILES['option_2_pic']['name'])) {
                            $data["response"] = FALSE;
                            $data["message"] = "Enter option_2/ upload option image.";
                        }else{
                           $mukul = "TRUE";
                        }
            }else if (trim($question_type) == 2) {
                           $mukul = "TRUE";
            }
            
            if($mukul == "TRUE"){
            if (trim($correct_option_1) == "" && trim($correct_option_2) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Select Correct Option.";
            }else {
                //$this->load->model("quiz_m");
                //$check_ar = array ("status" => 1 , "question" => $question);
                //$r = $this->quiz_m->check_quiz_exists($check_ar);
                //if ($r == FALSE) {
                // "question_time" => $question_time,
                    
                    $insert_arr = array("quiz_id" => $quiz_id,"category_id" => $category_id, "question_text" => $question_text, "question_description" => $question_description,  "question_type"=> $question_type, "question_marks"=> $question_marks, "question_negative_marks" => $question_negative_marks ,"eby" => $_SESSION["userdata"]["user_id"], "eat" => date("Y-m-d H:i:s"));
                    $this->load->model("quiz_m");
                    $r = $this->quiz_m->add_questions($insert_arr);
                    if ($r > 0) {
                    
                    if(isset($_FILES["question_pic"]) && count($_FILES["question_pic"]) > 0)
                     {
                      if (!file_exists(APPPATH.'../quiz_img/question_img/')) {
                            mkdir(APPPATH.'../quiz_img/question_img/' , 0777, true);
                      }
                      $ext = pathinfo($_FILES["question_pic"]["name"], PATHINFO_EXTENSION);
                      
                      move_uploaded_file($_FILES["question_pic"]["tmp_name"] , APPPATH.'../quiz_img/question_img/'.$r.".".$ext);
                      $update_arr = array("question_img_extension" => $ext);
                      $this->quiz_m->update_questions($r , $update_arr);
                     }
                    
                    if($question_type == 1){
                    for($i=1; $i<=$option_count; $i++)
                    {
                      $option_text = $_POST["option_".$i];
                      
                      if( $i == $correct_option_1 ){
                      $correct_option_status = 1;
                      }else{
                      $correct_option_status = 0;
                      }
                      
                      $insert_arr = array("question_id" => $r, "option_text" => $option_text, "correct_option_status" => $correct_option_status,"eby" => $_SESSION["userdata"]["user_id"], "eat" => date("Y-m-d H:i:s"));   
                      $this->load->model("quiz_m");
                      $f = $this->quiz_m->add_option($insert_arr);
                      
                       if ($f > 0) {
                         
                            if(isset($_FILES["option_".$i."_pic"]) && count($_FILES["option_".$i."_pic"]) > 0)
                             {
                              if (!file_exists(APPPATH.'../quiz_img/option_img/')) {
                                    mkdir(APPPATH.'../quiz_img/option_img/' , 0777, true);
                              }
                              $ext = pathinfo($_FILES["option_".$i."_pic"]["name"], PATHINFO_EXTENSION);
                              
                              move_uploaded_file($_FILES["option_".$i."_pic"]["tmp_name"] , APPPATH.'../quiz_img/option_img/'.$f.".".$ext);
                              $update_arr1 = array("option_img_extension" => $ext);
                              $this->quiz_m->update_option($f , $update_arr1);
                             }
                       
                              $data["response"] = TRUE;
                              $data["message"] = "Question added successfully.";
                      }else {
                        $data["response"] = FALSE;
                        $data["message"] = "Some error occured. Please try again later.";
                    }
                    
                    }
                    
                    }if($question_type == 2){
                    
                     for($i=5; $i<=6; $i++)
                    {
                      $option_text = $_POST["option_".$i];
                      if( $option_text == $correct_option_2){
                      $correct_option_status = 1;
                      }else{
                      $correct_option_status = 0;
                      }
                     
                       $insert_arr = array("question_id" => $r, "option_text" => $option_text, "correct_option_status" => $correct_option_status,"eby" => $_SESSION["userdata"]["user_id"], "eat" => date("Y-m-d H:i:s"));
                      $this->load->model("quiz_m");
                      $f = $this->quiz_m->add_option($insert_arr);
                       if ($f > 0) {
                        $data["response"] = TRUE;
                        $data["message"] = "Question added successfully.";
                        }else {
                        $data["response"] = FALSE;
                        $data["message"] = "Some error occured. Please try again later.";
                    }
                     }
                    }  
                     
                    } else {
                        $data["response"] = FALSE;
                        $data["message"] = "Some error occured. Please try again later.";
                    }
                    
                } //else {
                   // $data["response"] = FALSE;
                    //$data["message"] = "This Quiz already exists.";
               // }
               }
               else{
                $data["response"] = FALSE;
                $data["message"] = "Invalid form data.";
               }
            }
        //}
        echo json_encode($data);
    
    }
    
    public function delete_question()
    {
      
      $data = array();
        if ($this->input->is_ajax_request()) {
            $question_id = (isset($_POST["question_id"])) ? $this->input->post("question_id", TRUE) : 0;
            if ($question_id == 0 || trim($question_id) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Invalid Question ID.";
            } else {
                $this->load->model("quiz_m");

                $update_arr = array("status" => 0, "eby" => $_SESSION["userdata"]["user_id"], "eat" => date("Y-m-d H:i:s"));
                $r = $this->quiz_m->update_question($question_id, $update_arr);
                
                $tupdate_arr = array("status" => 0, "eby" => $_SESSION["userdata"]["user_id"], "eat" => date("Y-m-d H:i:s"));
                $tr = $this->quiz_m->update_option($question_id, $tupdate_arr);
                
                if ($r > 0 && $tr > 0) {
                    $data["response"] = TRUE;
                    $data["message"] = "Question deleted successfully.";
                } else {
                    $data["response"] = FALSE;
                    $data["message"] = "Some error occured. Please try again later.";
                }
            }
        }
        echo json_encode($data);
      
    }
    
    
    
     public function delete_student()
    {
        $data = array();
        if ($this->input->is_ajax_request()) {
            $student_id = (isset($_POST["student_id"])) ? $this->input->post("student_id", TRUE) : 0;
            if ($student_id == 0 || trim($student_id) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Invalid Student ID.";
            } else {
                $this->load->model("quiz_m");

                $update_arr = array("status" => 0, "eby" => $_SESSION["userdata"]["user_id"], "eat" => date("Y-m-d H:i:s"));
                $r = $this->quiz_m->update_registered_students($student_id, $update_arr);
                if ($r > 0) {
                    $data["response"] = TRUE;
                    $data["message"] = "Student Record deleted successfully.";
                } else {
                    $data["response"] = FALSE;
                    $data["message"] = "Some error occured. Please try again later.";
                }
            }
        }
        echo json_encode($data);
    }
    
    
    public function get_completed_quiz_id_by_student_id()
        {
                $data = array();
                if ($this->input->is_ajax_request()) {
                $student_id = (isset($_POST["student_id"])) ? $this->input->post("student_id", TRUE) : "";
                $this->load->model("quiz_m");
                $r = $this->quiz_m->get_completed_quiz_id_by_student_id($student_id);
                        if ($r != FALSE) {
                                $data["response"] = TRUE;
                                $data["message"] = " Record Found.";
                                $data["all_record"] = $r;
                        } else {
                                $data["response"] = FALSE;
                                $data["message"] = "No Record Found.";
                        }
                }
                echo json_encode($data);
        }
        

    public function get_student_quiz_result()
    {
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
    
      public function quiz_student_result($page = "quiz_student_result")
    {
        if (!file_exists(APPPATH . 'views/app/pages/' . $page . '.php')) {
            show_404();
        }

        $data = array();

        $data["title"] = "Quiz Result";

       /* $this->load->model("masters_m");

        $data['classes'] = $this->masters_m->get_all_class();
        $data['subjects'] = $this->masters_m->get_all_subject();*/

        $this->load->view('app/templates/header', $data);
        $this->load->view('app/templates/side_panel', $data);
        $this->load->view('app/pages/' . $page, $data);
        $this->load->view('app/templates/footer', $data);
    }
    
     public function get_quiz_attempted_students_by_quiz_id()
    {
        $data = array();
        if ($this->input->is_ajax_request()) {
            $quiz_id = (isset($_POST["quiz_id"])) ? $this->input->post("quiz_id", TRUE) : "";  
            if ($quiz_id == 0 || trim($quiz_id) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Invalid Quiz ID.";
            } else {
            $this->load->model("quiz_m");
            $r = $this->quiz_m->get_quiz_attempted_students_by_quiz_id($quiz_id);
            $this->load->model("masters_m");
            $data['classes'] = $this->masters_m->get_all_class();
            if ($r != FALSE) {
                $data["response"] = TRUE;
                $data["message"] = count($r) . " Record Found.";
                $data["total_record"] = count($r);
                //$data["all_record"] = $r;
                $all_record = array();
                foreach($r as $rr)
                 {
                  $all_rec = array();
                  
                  $all_rec["student_id"] = $rr->student_id;
                  $all_rec["fname"] = $rr->fname;
                  $all_rec["lname"] = $rr->lname;
                  $all_rec["scl_org_name"] = $rr->scl_org_name;
                  $all_rec["address"] = $rr->address;
                  $all_rec["mobile"] = $rr->mobile;
                  $all_rec["email"] = $rr->email;
                  $all_rec["class_id"] = $rr->class_id;
                  $all_rec["dob"] = $rr->dob;
                  $all_rec["gender"] = $rr->gender;
                  $all_rec["enc"] = sha1($rr->student_id.MY_APP_KEY);
                  $all_record[] = $all_rec;
                 }
                $data["all_record"] = $all_record;
            
            } else {
                $data["response"] = FALSE;
                $data["message"] = "No Record Found.";
            }
         }
        }
        echo json_encode($data);
    }
   
}
