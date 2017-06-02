<?php

  require_once('appvars.php');
  require_once('connectvars.php');

    if (isset($_GET['date']) && isset($_GET['name']) && isset($_GET['score']) && isset($_GET['screenshot']))  {

      $id = $_GET['id'];
      $date = $_GET['date'];
      $name = $_GET['name'];
      $score = $_GET['score'];
      $screenshot = $_GET['screenshot'];

    }

    else if (isset($_POST['date']) && isset($_POST['name']) && isset($_POST['score']))  {

      $id = $_POST['id'];
      $name = $_POST['name'];
      $score = $_POST['score'];

    }

    else {

      echo '<p class="error">Sorry, no high score was specified for removal.</p>';

    }

    if (isset($_POST['submit']))  {

      if ($_POST['confirm'] == 'YES') {
        @unlink(GW_UPLOADPATH . $screenshot);
      }

    }

  // CONNECT TO GUITARWARS DB
  $dbc = mysqli_connect('127.0.0.1', 'homestead', 'secret', 'guitar');

  $query = "SELECT * FROM guitarwars ORDER BY score DESC, date ASC";
  $data = mysqli_query($dbc, $query);

  echo '<h2>Welcome to guitarNerds Admin</h2>';

  echo '<hr />';

  echo '<table>';

  while ($row = mysqli_fetch_array($data))  {

    echo '<tr class="scorerow"><td><strong>' . $row['name'] . '</strong></td>';
    echo '<td> ' . $row['date'] . '</td>';
    echo '<td>' . $row['score'] . '</td>';
    echo '<td><a href="removescore.php?id=' . $row['id'] . '$amp;date=' . $row['date'] . '$amp;=name' . $row['name'] . '$amp;score=' . $row['score'] . '$amp;screenshot=' .  $row['screenshot'] . '">Remove</a></td></tr>';

  }

  echo '</table>';

  mysqli_close($dbc);

 ?>
