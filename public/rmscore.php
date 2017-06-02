<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Delete Scores - guitarNerds</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>guitarNerds Admin Page - remove HIGH SCOREZ</h2> -->

<?php

  require_once('appvars.php');
  // require_once('connectvars.php');

    if (isset($_GET['id']) && isset($_GET['date']) && isset($_GET['name']) && isset($_GET['score']) && isset($_GET['screenshot']))  {

      $id = $_GET['id'];
      $date = $_GET['date'];
      $name = $_GET['name'];
      $score = $_GET['score'];
      $screenshot = $_GET['screenshot'];

    }

    else if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['score']))  {

      $id = $_POST['id'];
      // $date = $_POST['date'];
      $name = $_POST['name'];
      $score = $_POST['score'];
      // $screenshot = $_POST['screenshot'];

    }

    else {

      echo '<p class="error">Sorry, no high score was specified for removal.</p>';

    }

    if (isset($_POST['submit']))  {

      if ($_POST['confirm'] == 'Yes') {
        @unlink(GW_UPLOADPATH . $screenshot);

  // CONNECT TO GUITARWARS DB
  $dbc = mysqli_connect('127.0.0.1', 'homestead', 'secret', 'guitar');

  $query = "DELETE FROM guitarwars WHERE id = $id LIMIT 1";
  mysqli_query($dbc, $query);
  mysqli_close($dbc);

  // Confirm success with the user
    echo '<p>The high score for ' . $name . ' was successfully removed.';

  }

  else {

    echo '<p class="error">The high score was not removed.</p>';

  }
}

  else if (isset($id) && isset($name) && isset($date) && isset($score) && isset($screenshot)) {

      echo '<p>Are you sure you want to delete the following high score?</p>';
      echo '<p><strong>Name: </strong>' . $name . '<br /><strong>Date: </strong>' . $date . '<br /><strong>Score: </strong>' . $score . '</p>';
      echo '<form method="post" action="rmscore.php">';
      echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
      echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
      echo '<input type="submit" value="Submit" name="submit" />';
      echo '<input type="hidden" name="id" value="' . $id . '" />';
      // echo '<input type="hidden" name="id" value="' . $date . '" />';
      echo '<input type="hidden" name="name" value="' . $name . '" />';
      echo '<input type="hidden" name="score" value="' . $score . '" />';
      echo '<input type="hidden" name="score" value="' . $screenshot . '" />';
      echo '</form>';

    }

echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';
?>

<!-- </body>
</html> -->
