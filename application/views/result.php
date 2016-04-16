<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Survey Form</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
    <style>
    .result {
      width: 200px;
      height: 350px;
      border: 1px solid grey;
      background: rgb(237, 199, 77);
      text-align: center;
      font-family:serif;
      margin: 5% 40%;
      line-height: 1.6em;
      font-size: 1.2em;
      padding: 10px;
    }

    </style>
  </head>
  <body>
    <div class="result">
      <h3>Results of the survey</h3>
    <p>You have submited this form: <?php echo $count; ?> times.</p>
    <p><?php echo $name; ?></p>
    <p><?php echo $location; ?></p>
    <p><?php echo $language; ?></p>
    <p><?php echo $comment; ?></p>
    </div>
  </body>
</html>
