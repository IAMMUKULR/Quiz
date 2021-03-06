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
                $data["all_record"] = $r;
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
            if (trim($quiz_name) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter quiz name.";
            } else if (trim($quiz_description) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter description.";
            } else {
                $this->load->model("quiz_m");
                $r = $this->quiz_m->check_quiz_exists($quiz_name);
                if ($r == FALSE) {
                    $insert_arr = array("quiz_name" => $quiz_name, "quiz_description" => $quiz_description, "eby" => $_SESSION["userdata"]["user_id"], "eat" => date("Y-m-d H:i:s"));
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

    public function update_quiz()
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
                $r = $this->quiz_m->delete_quiz($quiz_id, $update_arr);
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
            if ($quiz_id == 0 || trim($quiz_id) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Invalid Quiz-ID.";
            } else if ($quiz_name == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter your quiz name.";
            } else if (trim($quiz_description) == "") {
                $data["response"] = FALSE;
                $data["message"] = "Enter your quiz description.";
            } else {
                $this->load->model("quiz_m");
           
              $r = TRUE;
                if ($r == TRUE) {
                    $update_arr = array("quiz_id" => $quiz_id, "quiz_name" => $quiz_name, "quiz_description" => $quiz_description);
                    $r = $this->quiz_m->update_quiz($quiz_id, $update_arr);
                    if ($r > 0) {
                        $data["response"] = TRUE;
                        $data["message"] = "Quiz updated successfully.";
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
}
