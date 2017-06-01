<?php

  require_once('appvars.php');

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
