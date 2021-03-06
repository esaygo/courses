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

    function destroy($course_id) {
      $query = "DELETE FROM courses WHERE id = ?";
      $this->db->query($query,$course_id);
      redirect('../');
    }


     function get_all_courses() {
       return $this->db->query("SELECT * FROM courses ORDER BY id DESC")->result_array();
         //pass the courses data back to the controller
     }

     function get_record($id) {
       $query = "SELECT * FROM courses WHERE id = ?";
       return $this->db->query($query,$id)->row_array();

     }

     function update($new_vals) {
       $query = " UPDATE courses SET name='" . $new_vals["new_name"]. "', description='" . $new_vals["new_desc"]. "' WHERE id=" .$new_vals["id"]. ";";
       $this->db->query($query);
       redirect('../');
     }
  }

?>
