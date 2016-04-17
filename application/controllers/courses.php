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
		redirect('/');
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
		 redirect('/');
	 }

	 public function destroy() {
		 $this->load->model("Course");
		 $this->load->view('course_to_delete', ['data' => $course_id]);
		 $course_id = $this->input->post();

		 //$this->Course->destroy($course_id['id']);
	 }

	 public function update() {
		 $this->load->model("Course");
		 $course_id = $this->input->post();
		 $this->Course->destroy($course_id);
	 }

}
