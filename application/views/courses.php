<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Coding Courses</title>
    <style>
      form {
        padding: 15px;
        line-height: 2.5em;
      }
      div {
        width: 50%;
        margin: 5% 10%;
      }
      table {
        margin-left: 10%;
        padding: 15px;
      }
      #message{
        margin-left: 100px;
      }
    </style>
  </head>
  <body>
    <p id="message">
      <?= $this->session->flashdata('error_validation');?>
    </p>
    <p>
      <!-- < ?= form_open('courses');?> -->
    <!-- </p> -->
 <div>
  <fieldset>
    <legend>Add a new course</legend>
    <form action="courses/add_course" method="post">
    <p>Name:<input type="text" name="name" required></p>
    <p>Description:<input type="text" name="description" required></p>
    <input type="submit" value="Add course">
  </fieldset>
 </form>
</div>
<table border=1>
  <thead>
    <th>Name</th>
    <th>Description</th>
    <th>Date</th>
    <th>Action</th>
  <thead>
  <tbody>
  <?php foreach($courses_data as $key=>$course) { ?>
    <tr>
    <td><?php
      echo $course['name']; ?></td>
    <td><?php
      echo $course['description']; ?></td>
    <td><?php echo $course['created_at']; ?></td>
    <td>
      <select name="actions">
        <option disabled selected option>--select an option--</option>
        <option value="delete"><form><button type="submit" value="delete">delete<button></form></option>
        <option value="update"><form><button type="submit" value="update">update<button></form><option>
      </select>
    </td>
  </tr>
  <?php } ?>
  </tbody>
</table>
  </body>
</html>
