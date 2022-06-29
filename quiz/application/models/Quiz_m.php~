<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_m extends CI_Model {


	public function __construct()
	 {
	  $this->load->database();
	 }
	
	
	
	public function check_quiz_exists($check_ar)
	 {
		// $r = $this->db->query("select * from master_users where status=1 and user_email='".$user_email."' and user_id!='".$user_id."'");
	  $r = $this->db->get_where("master_quiz" , $check_ar);
	  if($r->num_rows() > 0){ return $r->result();  return true; }else{ return FALSE; }
	 }
	 
	 
	 public function check_email_does_exists($check_ar)
	 {
		// $r = $this->db->query("select * from master_users where status=1 and user_email='".$user_email."' and user_id!='".$user_id."'");
	  $r = $this->db->get_where("master_students" , $check_ar);
	  if($r->num_rows() > 0){ return $r->result();  return true; }else{ return FALSE; }
	 }
     
	
     public function get_all_quiz()
	 {
	 $r = $this->db->query("SELECT t1.*,t2.subject_name from master_quiz t1,master_subject t2 WHERE t1.status=1 and t2.subject_id = t1.subject_id and t2.status=1");
	 
	 if($r->num_rows()>0){
	   return $r->result();
	 }else{
	   return FALSE;
	 }
	  //$r = $this->db->get_where("master_quiz" , array("status" => 1));
	  //if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	 
	 
	      public function get_all_registered_students()
	 {
	 $r = $this->db->query("SELECT t1.*,t2.class_name from master_students t1,master_class t2 WHERE t1.status=1 and t2.class_id = t1.class_id and t2.status=1");
	 
	 if($r->num_rows()>0){
	   return $r->result();
	 }else{
	   return FALSE;
	 }
	  //$r = $this->db->get_where("master_quiz" , array("status" => 1));
	  //if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	 
	 


	public function add_quiz($insert_arr)
	 {
	  $this->db->insert("master_quiz" , $insert_arr);
	  return $this->db->insert_id();
	 }
	

	public function update_quiz($quiz_id , $update_arr)
	 {
	  $this->db->where("quiz_id" , $quiz_id);
	  $this->db->update("master_quiz" , $update_arr);
	  return $this->db->affected_rows();
	 }
	
     public function get_quiz_details_by_id($quiz_id)
	 {
	  $r = $this->db->get_where("master_quiz" , array("status" => 1 , "quiz_id" => $quiz_id));
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	
	
	public function get_class_details_by_id($quiz_classes_id)
	 {
          $r = $this->db->query("select * from master_class where status=1 and class_id in (".$quiz_classes_id.")");
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	 
	 public function add_questions($insert_arr){
	   $this->db->insert("master_questions" , $insert_arr);
	  return $this->db->insert_id();
	 }
	
	

	public function update_questions($question_id , $update_arr)
	 {
	  $this->db->where("question_id" , $question_id);
	  $this->db->update("master_questions" , $update_arr);
	  return $this->db->affected_rows();
	 }
	
	
	 public function get_all_questions($quiz_id)
	 {
	 $r = $this->db->get_where("master_questions", array("quiz_id"=>$quiz_id , "status"=>1));
	 
	 if($r->num_rows()>0){
	   return $r->result();
	 }else{
	   return FALSE;
	 }
	  //$r = $this->db->get_where("master_quiz" , array("status" => 1));
	  //if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	 
	 public function add_option($insert_arr)
	 {
	  $this->db->insert("trans_questions" , $insert_arr);
	  return $this->db->insert_id();
	 }
	 
	 
	 public function update_option($trans_question_id , $update_arr)
	  {
	   $this->db->where("trans_question_id" , $trans_question_id);
	   $this->db->update("trans_questions" , $update_arr);
	   return $this->db->affected_rows();
	  }
	 
	 
	 public function get_option_details_by_id($question_id)
	 {
	  $r = $this->db->query("select * from trans_questions where status=1 and question_id in (".$question_id.")");
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }  
	 
	 
	 public function update_question($question_id , $update_arr)
	 {
	  $this->db->where("question_id" , $question_id);
	  $this->db->update("master_questions" , $update_arr);
	  return $this->db->affected_rows();
	 }
	 
	
	 
	 
	 public function validate_student_login($student_email , $student_password)
	 {
	  $r = $this->db->get_where("master_students", array('email'=>$student_email , 'password'=>$student_password));
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	
	 
	public function add_student_registration($insert_arr){
	 $this->db->insert("master_students" , $insert_arr);
	 return $this->db->insert_id();
	}
	
	public function get_quiz_by_class_id($class_id)
	{
	   $r = $this->db->query("select t1.*,t2.subject_name,SHA1(concat(quiz_id,'".MY_APP_KEY."')) as enc from master_quiz t1, master_subject t2  where t1.status=1 and t2.status=1 and t1.subject_id = t2.subject_id and t1.quiz_status=1 and find_in_set(".$class_id.",t1.quiz_classes_id) and t1.quiz_id not in (select t3.quiz_id from master_quiz_completed t3 where t3.status=1 and t3.student_id=".$_SESSION["student_data"]["student_id"].")");
	    if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	}
	
	public function get_all_quiz_r($class_id)
	 {
	  $r = $this->db->query("select t1.*,t2.subject_name,SHA1(concat(quiz_id,'".MY_APP_KEY."')) as enc from master_quiz t1, master_subject t2  where t1.status=1 and t2.status=1 and t1.subject_id = t2.subject_id and t1.quiz_status=1 and find_in_set(".$class_id.",t1.quiz_classes_id) and t1.quiz_id in (select t3.quiz_id from master_quiz_completed t3 where t3.status=1 and t3.student_id=".$_SESSION["student_data"]["student_id"].")");
	    if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	
	
         public function update_registered_students($student_id , $update_arr)
	 {
	  $this->db->where("student_id" , $student_id);
	  $this->db->update("master_students" , $update_arr);
	  return $this->db->affected_rows();
	 }
	
	 public function get_questions($quiz_id, $student_id)
	 {
	 
	$r = $this->db->query("SELECT t1.* FROM `master_questions` t1 WHERE t1.status=1 and t1.`quiz_id`='".$quiz_id."' and t1.question_id not in (SELECT t2.question_id FROM `master_student_quiz_response` t2 WHERE t2.status=1 and t2.`quiz_id`='".$quiz_id."' and t2.`student_id`='".$student_id."' and t2.trans_question_id!=0)");
	
	    if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	  
	 }
	
	public function save_student_question_response($insert_array)
	 {
	  $this->db->insert("master_student_quiz_response" , $insert_array);
	 return $this->db->insert_id();
	 }
	 
	 public function quiz_completed($insert_array)
	 {
	  $this->db->insert("master_quiz_completed" , $insert_array);
	 return $this->db->insert_id();
	 }
	
	public function get_completed_quiz_id_by_student_id($student_id)
	 {
	  $r = $this->db->get_where("master_quiz_completed", array('student_id'=>$student_id, "status" => 1 ));
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
	
	 
	 
	 public function num_of_question_response($quiz_id, $student_id)
	 {
	  $r = $this->db->get_where("master_student_quiz_response", array('quiz_id'=>$quiz_id , 'student_id'=>$student_id  , "status" => 1));
	  if($r->num_rows() > 0){ return $r->num_rows(); }else{ return FALSE; }
	 }


        public function get_student_quiz_result($student_id , $quiz_id , $question_id)
        {
          $r = $this->db->get_where("master_student_quiz_response", array('quiz_id'=>$quiz_id , 'student_id'=>$student_id , "question_id" => $question_id , "status" => 1 ));
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
        }
        
         public function get_user_details_by_id($student_id)
	 {
	  $r = $this->db->get_where("master_students" , array("status" => 1 , "student_id" => $student_id));
	  if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
       
       public function update_student_details($student_id , $update_arr)
	 {
	  $this->db->where("student_id" , $student_id);
	  $this->db->update("master_students" , $update_arr);
	  return $this->db->affected_rows();
	 }
	 
	 
	 public function get_quiz_attempted_students_by_quiz_id($quiz_id)
	 {
	 $r = $this->db->query("SELECT t1.* from master_students t1,master_quiz_completed t2 WHERE t1.status=1 and t2.student_id = t1.student_id and t2.quiz_id=".$quiz_id." and t2.status=1");
	 
	 if($r->num_rows()>0){
	   return $r->result();
	 }else{
	   return FALSE;
	 }
	  //$r = $this->db->get_where("master_quiz" , array("status" => 1));
	  //if($r->num_rows() > 0){ return $r->result(); }else{ return FALSE; }
	 }
       
}
