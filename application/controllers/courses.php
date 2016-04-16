<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function index() {
		parent::__construct();
		$this->output->enable_profiler(TRUE);
		//$this->show_courses();
		//pass the courses data to the courses view
		$courses_db = $this->show_courses();
		// var_dump($courses_db);
		// die();
		foreach($courses_db as $key=>$course) {

		$send_data[]=array(
				'name'=>$course['name'],
        'description'=>$course['description'],
				'date'=>$course['created_at']
    );
	}

    $this->load->view('courses', ['course_data' => $send_data]);

	}

	public function add_course() {
		$this->load->model("Course");

			$name = $this->input->post('name', TRUE);
      $description = $this->input->post('description', TRUE);

			$course_details = array(
					"name" => $name,
					"description" => $description
			);

			$add_course = $this->Course->add_course($course_details);

			// if($add_course === TRUE) {
			// 		redirect('/');
			// }
	}
	 public function show_courses() {
		 $this->load->model("Course");
		 $course = $this->Course->get_all_courses();
			return $course;
	 }


// 	class Courses extends CI_Controller {
//     public function show($id)
//     {
//         $this->output->enable_profiler(TRUE); //enables the profiler
//         $this->load->model("Course"); //loads the model
//         $course = $this->Course->get_course_by_id($id);  //calls the get_course_by_id method
//         var_dump($course);
//     }
//     public function add()
//     {
//         $this->load->model("Course");
//         $course_details = array(
//             "title" => "JavaScript",
//             "description" => "JavaScript Rocks!"
//         );
//         $add_course = $this->Course->add_course($course_details);
//         if($add_course === TRUE) {
//             echo "Course is added!";
//         }
//     }
// }

}
