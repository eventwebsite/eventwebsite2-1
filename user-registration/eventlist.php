<?php
mysql_connect("localhost", "root","") or die(mysql_error());
mysql_select_db("user-registration") or die(mysql_error());

$query = "SELECT * FROM events";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
?>
<html>
<body>
    <form action="" method="POST">
       

<select name='filston'>
        <?php 
        
        while($row1 = mysql_fetch_array($result)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
         
         }
       
        ?> 

  </select>     
    <input type="submit" value="go" name="submit"> 

</form>
<?php
if(isset($_POST["submit"]))
{
$event=$_POST['filston'];
echo "$event";
}
?>
<h2> option created </h2> 
    </body>
</html>




