<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lab One - Teams</title>
    <link rel="stylesheet" href="master.css">
  </head>
  <body>
    <table>
      <!-- Table Heads -->
      <tr>
        <th>City</th>
        <th>Nickname</th>
        <th>Division</th>
      </tr>
      <?php
        // Creates DB connection
        $db = new PDO('mysql:host=172.31.22.43;dbname=Braden_W1095701', 'Braden_W1095701', 'P8TwvNsomx');
        if (!$db) {
           echo 'could not connect';
        } else {
          didConnect($db);
        }

        // function to run if the database connects successfully
        function didConnect($db) {

          // create and run query
          $sql = "SELECT * FROM teams";
          $cmd = $db->prepare($sql);
          $cmd->execute();

          // fetch all rows from select
          $teams = $cmd->fetchAll();

          // Build the table with values
          foreach ($teams as $value) {
            echo "<tr>" . "<td>" . $value['city'] . "</td>" . "<td>" . $value['nickname'] . "</td>" . "<td>" . $value['division'] . "</td>" . "</tr>";
          }
        }

        // disconnect from DB
        $db = null;

       ?>
    </table>
  </body>
</html>
