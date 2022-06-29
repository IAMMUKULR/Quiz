<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masters extends CI_Controller {
        
	
	public function __construct()
	 {
	  parent::__construct();
	  
	  if(!isset($_SESSION['userdata']) || $_SESSION['userdata']['user_logged_status'] != TRUE)
	   {
	    redirect('app/logout');
	   }
	  
	  $_SESSION['page_start_time'] = microtime(true); 
	 }
	
	
	public function classes($page = "classes")
	 {
	  if(!file_exists(APPPATH.'views/app/pages/'.$page.'.php'))
           {
	    show_404();
	   }
	  
	  $data = array();
	  
	  $data["title"] = "Classes";
	  
	  $this->load->view('app/templates/header' , $data);
	  $this->load->view('app/templates/side_panel' , $data);
	  $this->load->view('app/pages/'.$page , $data);
	  $this->load->view('app/templates/footer' , $data);
	 }
	 
	 public function quiz_category($page = "quiz_category")
	 {
	  if(!file_exists(APPPATH.'views/app/pages/'.$page.'.php'))
           {
	    show_404();
	   }
	  
	  $data = array();
	  
	  
	  $data["title"] = "quiz_category";
	  
	  
	  $this->load->view('app/templates/header' , $data);
	  $this->load->view('app/templates/side_panel' , $data);
	  $this->load->view('app/pages/'.$page , $data);
	  $this->load->view('app/templates/footer' , $data);
	 }
	
	
	public function add_class()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $class_name = (isset($_POST["class_name"]))?$this->input->post("class_name" , TRUE):"";
	    if(trim($class_name) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter user class name.";
	     }
	    else
	     {
	      $this->load->model("masters_m");
	      $r = $this->masters_m->check_class_exists($class_name);
	      if($r == FALSE)
	       {
	        $insert_arr = array("class_name" => $class_name , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
	        $r = $this->masters_m->add_class($insert_arr);
	        if($r > 0)
	         {
	          $data["response"] = TRUE;
	          $data["message"] = "Class added successfully.";
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
	        $data["message"] = "This Class already exists.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	 
	 
	 public function add_category()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $category_name = (isset($_POST["category_name"]))?$this->input->post("category_name" , TRUE):"";
	    if(trim($category_name) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Enter Category name.";
	     }
	    else
	     {
	      $this->load->model("masters_m");
	      $r = $this->masters_m->check_category_exists($category_name);
	      if($r == FALSE)
	       {
	        $insert_arr = array("category_name" => $category_name , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));

	        $r = $this->masters_m->add_category($insert_arr);
	        if($r > 0)
	         {
	          $data["response"] = TRUE;
	          $data["message"] = "Category added successfully.";
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
	        $data["message"] = "This Category already exists.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	 
	
	
	public function get_all_class()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $this->load->model("masters_m");
	    $r = $this->masters_m->get_all_class();
	    if($r != FALSE)
	     {
	      $data["response"] = TRUE;
	      $data["message"] = count($r)." Record Found.";
	      $data["total_record"] = count($r);
	      $data["all_record"] = $r;
	     }
	    else
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "No Record Found.";
	     }
	   }
	  echo json_encode($data);
	 }
	 
	 
	 
	 public function get_all_category()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $this->load->model("masters_m");
	    $r = $this->masters_m->get_all_category();
	    if($r != FALSE)
	     {
	      $data["response"] = TRUE;
	      $data["message"] = count($r)." Record Found.";
	      $data["total_record"] = count($r);
	      $data["all_record"] = $r;
	     }
	    else
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "No Record Found.";
	     }
	   }
	  echo json_encode($data);
	 }
	 
	
	
	public function delete_class()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $class_id = (isset($_POST["class_id"]))?$this->input->post("class_id" , TRUE):0;
	    if($class_id == 0 || trim($class_id) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Invalid Class ID.";
	     }
	    else
	     {
	      $this->load->model("masters_m");
	      
	      $update_arr = array("status" => 0 , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
	      $r = $this->masters_m->update_class($class_id , $update_arr);
	      if($r > 0)
	       {
	        $data["response"] = TRUE;
	        $data["message"] = "Class deleted successfully.";
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "Some error occured. Please try again later.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	 
	 
	 

	
	public function delete_category()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $category_id = (isset($_POST["category_id"]))?$this->input->post("category_id" , TRUE):0;
	    if($category_id == 0 || trim($category_id) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Invalid Category ID.";
	     }
	    else
	     {
	      $this->load->model("masters_m");
	      
	      $update_arr = array("status" => 0 , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
	      $r = $this->masters_m->update_category($category_id , $update_arr);
	      if($r > 0)
	       {
	        $data["response"] = TRUE;
	        $data["message"] = "Category deleted successfully.";
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "Some error occured. Please try again later.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	 
	 
    

	//  subject

	public function subjects($page = "subjects")
	 {
	  if(!file_exists(APPPATH.'views/app/pages/'.$page.'.php'))
           {
	    show_404();
	   }
	  
	  $data = array();
	  
	  $data["title"] = "Subjects";
	  
	  $this->load->view('app/templates/header' , $data);
	  $this->load->view('app/templates/side_panel' , $data);
	  $this->load->view('app/pages/'.$page , $data);
	  $this->load->view('app/templates/footer' , $data);
	 }


	 public function get_all_subject()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $this->load->model("masters_m");
	    $r = $this->masters_m->get_all_subject();
	    if($r != FALSE)
	     {
	      $data["response"] = TRUE;
	      $data["message"] = count($r)." Record Found.";
	      $data["total_record"] = count($r);
	      $data["all_record"] = $r;
	     }
	    else
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "No Record Found.";
	     }
	   }
	  echo json_encode($data);
	 }
	 
	
	 public function add_subject()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $subject_name = (isset($_POST["subject_name"]))?$this->input->post("subject_name" , TRUE):"";
	    if(trim($subject_name) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Please Enter Subject.";
	     }
	    else
	     {
	      $this->load->model("masters_m");
	      $r = $this->masters_m->check_subject_exists($subject_name);
	      if($r == FALSE)
	       {
	        $insert_arr = array("subject_name" => $subject_name , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
	        $r = $this->masters_m->add_subject($insert_arr);
	        if($r > 0)
	         {
	          $data["response"] = TRUE;
	          $data["message"] = "Subject added successfully.";
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
	        $data["message"] = "This Subject already exists.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }


	 public function delete_subject()
	 {
	  $data = array();
	  if($this->input->is_ajax_request())
	   {
	    $subject_id = (isset($_POST["subject_id"]))?$this->input->post("subject_id" , TRUE):0;
	    if($subject_id == 0 || trim($subject_id) == "")
	     {
	      $data["response"] = FALSE;
	      $data["message"] = "Invalid Subject ID.";
	     }
	    else
	     {
	      $this->load->model("masters_m");
	      
	      $update_arr = array("status" => 0 , "eby" => $_SESSION["userdata"]["user_id"] , "eat" => date("Y-m-d H:i:s"));
	      $r = $this->masters_m->update_subject($subject_id , $update_arr);
	      if($r > 0)
	       {
	        $data["response"] = TRUE;
	        $data["message"] = "Subject deleted successfully.";
	       }
	      else
	       {
	        $data["response"] = FALSE;
	        $data["message"] = "Some error occured. Please try again later.";
	       }
	     }
	   }
	  echo json_encode($data);
	 }
	
}
