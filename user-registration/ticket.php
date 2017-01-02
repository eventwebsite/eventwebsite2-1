<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "user-registration";

session_start();
$id = $_SESSION['sess_id'];

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `events`";

// for method 1

$result1 = mysqli_query($connect, $query);

?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP SELECT OPTIONS FROM DATABASE </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
       <p><a href="myevents.php">My events</a> | <a href="allEvents.php">All events</a> | <a href="ticket.php">Book Ticket </a></p>

        <!--Method One-->
 <form action="" method="POST">
        <select name="eventlist">

            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
            

        </select>
    
       <input type="submit" value="go" name="submit"> 
  
<?php     
if(isset($_POST["submit"]))
{
    $event=$_POST['eventlist'];
        
$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('user-registration') or die("cannot select DB");
    
    

	$query=mysql_query("SELECT * FROM ticket WHERE memberid='".$id."'");
	$numrows=mysql_num_rows($query);
    $result33=mysql_query("SELECT tickets FROM events WHERE id='$event' limit 1");
    $nbtickets = mysql_fetch_array($result33);

    
    if($nbtickets[0] <=0){
        
        echo "No tickets left";
        mysql_close();
        
    }else{
        
        $query2=mysql_query("UPDATE events SET tickets= tickets-1 WHERE id='$event'");
        $sql="INSERT INTO ticket(memberid,eventid) VALUES('$id','$event')";

	   $result=mysql_query($sql);
        if($result){
	echo "Event Successfully Booked";
	} else {
	echo "Failure!";
	}
    }
	
    }
	




?>

</form>

    </body>

</html>
