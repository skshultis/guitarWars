<?php

require_once('appvars.php');
// require_once('connectvars.php');

// db connection
$dbc = mysqli_connect('127.0.0.1', 'homestead', 'secret', 'guitar');

// gets scores from db
$query = "SELECT * FROM guitarwars ORDER BY score DESC, date ASC";
$data = mysqli_query($dbc, $query);

echo '<h2>Delete page</h2>';

// loop through score data, formatting as html table
echo '<table>';

while ($row = mysqli_fetch_array($data))  {

    echo '<tr class="scorerow"><td><strong>' . $row['name'] . '</strong></td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['score'] . '</td>';
    echo '<td><a href="rmscore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] .
      '&amp;name=' . $row['name'] . '&amp;score=' . $row['score'] .
      '&amp;screenshot=' . $row['screenshot'] . '">Remove</a></td></tr>';

}

echo '</table>';

mysqli_close($dbc);

 ?>
