<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed!');
	class Users_model extends CI_Model {
		public function __construct()
		{
			$this->load->database();
			
		}	
		
		//addstudent
		public function addstudent($name, $student_id, $course_name, $faculty)
		{
		    header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Headers: *');		
			$data = array(
			'name' => $name,
			'student_id' => $student_id,
			'course_name' => $course_name,
			'faculty' => $faculty
			
			); 
			
			header('Content-Type: application/json');
			return $this->db->insert('students', $data);
		}	
		//get all students
		public function getallstudents()
		{
			
			return $this->db->get('students')->result();
			
		}
		//delete
		public function delete($id) {
			$this->db->where('id', $id);
			return $this->db->delete('students');
		}
		//update
		public function editstudent($id, $name, $student_id, $course_name, $faculty){
			$this->db->where('id', $id);
			return $this->db->update('students', array(
            'name'     => $name,
            'student_id'    => $student_id,
            'course_name'      => $course_name,
            'faculty'         => $faculty
			));
		}
		//search
		public function search($key)
		{
			$this->db->like('name',$key);
			$query = $this->db->get('students');
			return $query->result();
		}
		
		
		
		
		
	}
	
?>		