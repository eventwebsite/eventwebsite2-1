<?php 
session_start();
?>
<!doctype html>
<html>
<head>
<title>Register events</title>
</head>
<body>

    <p><a href="myevents.php">My events</a> | <a href="allEvents.php">All events</a> | <a href="ticket.php">Book Ticket </a></p>
<h3>Registration Form for events</h3>
    <h4> Welcome, <?=$_SESSION['sess_id'];?> </h4>
<form action="" method="POST">
Title: <input type="text" name="title"><br />
Description & Features : <input type="text" name="description"><br />
Location: <input type="text" name="location"><br />
Start Date: <input type="date" name="startdate"><br />
End Date: <input type="date" name="enddate"><br />
Categorisation:   <select name="categorisation">
  <option value="Tennis">Tennis event</option>
  <option value="Football">Football event</option>
  <option value="Basket">Basket-ball event</option>
  <option value="Tournament">Tournament</option>
</select> <br />
Tickets: <input type="number" name="tickets"><br />
<input type="submit" value="Add event" name="submit" />
</form>
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['title']) && !empty($_POST['description'])) {
	$title=$_POST['title'];
	$description=$_POST['description'];
    $location=$_POST['location'];
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];
    $categorisation=$_POST['categorisation'];
    $tickets=$_POST['tickets'];
    $id = $_SESSION['sess_id'];
    

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('user-registration') or die("cannot select DB");

	$query=mysql_query("SELECT * FROM events WHERE title='".$title."'");
	$numrows=mysql_num_rows($query);
	if($numrows==0)
	{
	$sql="INSERT INTO events(title,description,location,startdate,enddate,categorisation,tickets,userid) VALUES('$title','$description','$location','$startdate','$enddate','$categorisation','$tickets','$id')";

	$result=mysql_query($sql);


	if($result){
	echo "Event Successfully Created";
	} else {
	echo "Failure!";
	}

	} else {
	echo "That title already exists! Please try again with another.";
	}

} else {
	echo "All fields are required!";
}
}
?>

</body>
</html>