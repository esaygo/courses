<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update Course</title>
  </head>
  <body>
    <h3>Update the following course:</h3>
    <p><strong>Course name: </strong> <?php echo $name; ?></p>
    <p><strong>Course description: </strong><?php echo $description; ?></p>
    <form action="../update_course" method="post">
      <input name="id" type="hidden" value="<?= $id ?>">
      <label>New course name: </label><input name="new_name" type="text">
      <label>New course desc: </label><input name="new_desc" type="text">
    <button type="submit" value="update">Update</button>
    </form>
  </body>
</html>
