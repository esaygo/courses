<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function index() {
		parent::__construct();
		$this->output->enable_profiler(TRUE);

		//pass the courses data to the courses view
		$courses_db['courses_data'] = $this->show_courses();
    $this->load->view('courses', $courses_db);
	}

	public function add_course() {

		$this->load->model("Course");
		//$this->load->helper(array('courses', 'url'));

		$name = $this->input->post('name', TRUE);
    $description = $this->input->post('description', TRUE);

		//$test = $this->form_validation->set_rules('name','Name',min_length[15]);
		//$test2 = $this->form_validation->run();
		if(strlen($name) > 15) {
			$course_details = array(
					"name" => $name,
					"description" => $description);

			$add_course = $this->Course->add_course($course_details);
			$this->session->set_flashdata('error_validation','Course added successfully');

		} else {
				$this->session->set_flashdata('error_validation','Course name should be at least 15 characters');
		}
		redirect('../');
	}
	 public function show_courses() {
		 $this->load->model("Course");
		 $course = $this->Course->get_all_courses();
		 return $course;
	 }

	 public function destroy_confirm() {
		 $course_info['data'] = $this->input->post();
		$this->load->view('course_to_delete', $course_info);
	 }

	 public function dont_delete() {
		 redirect('../');
	 }

	 public function destroy() {
		 $this->load->model("Course");
		 $this->load->view('course_to_delete', ['data' => $course_id]);
		 $course_id = $this->input->post();
		 $this->Course->destroy($course_id['id']);
	 }

	 public function update($id) {
		 //echo $id;
		 $this->load->model("Course");
		 //$course_id = $this->input->post();
		 $update_course = $this->Course->get_record($id);

		 $this->load->view('course_to_update', [
			 								'id' => $update_course['id'],
			 								 'name' => $update_course['name'],
											 'description'=> $update_course['description']
		 ]);
  // 'id' => string '22' (length=2)
  // 'name' => string 'Irish dancing' (length=13)
  // 'description' => string 'learn to dance like a leprechaun' (length=32)
  // 'created_at' => string '2016-04-16 18:00:50' (length=19)
  // 'updated_at' => string '2016-04-16 18:00:50' (length=19)
	 }
public function update_course() {
	$this->load->model("Course");
	$new_vals = $this->input->post();
	// var_dump($new_vals);
	// die();
	$this->Course->update($new_vals);
}

}
