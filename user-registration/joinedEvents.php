
<?php
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('user-registration');

$query = "SELECT * FROM tickets"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

session_start();
 $id = $_SESSION['sess_id'];
?>

<html>
<head>
<title>Welcome</title>
</head>
<body>
<p><a href="myevents.php">My events</a> | <a href="allEvents.php">All events</a> </p>
     <h4> Welcome, <?=$_SESSION['sess_id'];?> </h4>
    <?php
echo "<events>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
 if ($id==$row['memberid']) {
   echo "<tr><td>" . $row['title'] . "</td> <td>" . $row['description'] . "</td> <td>" . $row['location']."</td> <td>" . $row['startdate']."</td> <td>" . $row['enddate']."</td> <td>" . $row['categorisation']."</td> <td>" . $row['tickets']."</td> <td>" . "</td><br /></tr>" ;  
 }

      //$row['index'] the index here is a field name
}

echo "</events>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection
    ?>

</body>
</html>