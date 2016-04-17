<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delete Course</title>
  </head>
  <body>
    <h3>Are you sure you want to delete the following course:</h3>
    <p><strong>Course name: </strong> <?php echo $data['name']; ?></p>
    <p><strong>Course description: </strong><?php echo $data['description']; ?></p>
    <form action="dont_delete" method="post">
    <button type="submit" value="No">No</button>
    </form>
    <form action="destroy" method="post">
      <input name="id" type="hidden" value="<?= $data['id'];?>">
      <button type="submit" value="delete">Yes, delete</button>
    </form>
  </body>
</html>
