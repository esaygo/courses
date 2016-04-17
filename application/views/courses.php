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
        font-size: 0.9em;
      }
      #message{
        margin-left: 100px;
      }
      .actions {
        display: inline-block;
        margin-left: 4px;
        padding: 0;
      }
      button, img {
        display: inline-block;
        margin: 0;
        padding: 0;
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
    <th width="60">Action</th>
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
          <form class="actions" action="courses/destroy_confirm" method="post">
            <input name="id" type="hidden" value="<?= $course['id'];?>">
            <input name="name" type="hidden" value="<?= $course['name'];?>">
            <input name="description" type="hidden" value="<?= $course['description'];?>">
            <button type="submit" value="delete"><img src="assets/img/delete_icon.gif" alt="delete" heigth="10" width="15"></button>
          </form>
          <form class="actions" action="courses/update" method="post">
            <input name="id" type="hidden" value="<?= $course['id'];?>">
            <button type="submit" value="update"><img src="assets/img/edit_icon.gif" alt="delete" heigth="10" width="15"></button>
          </form>
    </td>
  </tr>
  <?php } ?>
  </tbody>
</table>
  </body>
</html>
