<?php

class Course extends CI_Model {

    function add_course($course_details) {

      $query = 'INSERT INTO courses (name, description, created_at,updated_at) VALUES (?,?,?,NOW())';
      // echo $query;
      // die();
      $values = array($course_details['name'], $course_details['description'], date("Y-m-d H:i:s"));
      return $this->db->query($query, $values);
      // var_dump($course);
			// die();
    }

     function get_all_courses() {
       return $this->db->query("SELECT * FROM courses")->result_array();

         //pass the courses data back to the controller

     }

    //  function get_course_by_id($course_id) {
    //      return $this->db->query("SELECT * FROM courses WHERE id = ?", array($course_id))->row_array();
    //  }

}

?>
