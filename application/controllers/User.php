<?php
	defined ('BASEPATH') OR exit ('No direct script access allowed');
	
	class User extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			//$this->load->model('Users_model');
			$this->load->helper('url_helper');
		    $this->load->model('Users_model', 'user');
			
		}
		
		//add student
		public function addstudent()
		{
	        header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Headers: *');	
			
		    $name = $this->input->post('name');
			$student_id = $this->input->post('student_id');
			$course_name = $this->input->post('course_name');
			$faculty = $this->input->post('faculty');
            
			if($this->user->addstudent($name, $student_id, $course_name, $faculty)) {
				$inserted = true;
				} else {
				$inserted = false;
			}
			
			$data = array('inserted' => $inserted);
			
			header('Content-Type: application/json');
			print json_encode($data);
			
		}
		//get student
		public function students()
		{   
			
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Headers: *');
			$data = $this->user->getallstudents();
			header('Content-Type: application/json');
			echo json_encode($data);
			
		}
		//delete student
		public function delete() {
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Headers: *');
			
			$id = $this->input->post('id');
			
			if($this->user->delete($id)) {
				$deleted = true;
				} else {
				$deleted = false;
			}
			
			$data = array('deleted' => $deleted);
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		//update student
		public function editstudent() {
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Headers: *');
			
			$id  = $this->input->post('id');
			$name  = $this->input->post('name');
			$student_id = $this->input->post('student_id');
			$course_name   = $this->input->post('course_name');
			$faculty  = $this->input->post('faculty');
			
			$this->user->editstudent($id, $name, $student_id, $course_name, $faculty);
		}
		//search student
		public function search()
		{
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Headers: *');
			$key = $this->input->post('name');
			$data=$this->user->search($key);
			header('Content-Type: application/json');
			echo json_encode($data);
			
		}		
		
	
		
	}	
?>
