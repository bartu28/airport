<?php 
include "config.php";
?>
<link rel="stylesheet" href="styles.css" />
<h1>Flight Attendant Admin</h1>
<h2>Delete Flight Attendant</h2>

<form action="flight_attendant_delete.php" method="POST">
<select name="fa_id">

<?php
$sql_command = "SELECT fa_id FROM flight_attendant";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $fa_id = $id_rows['fa_id'];
        echo "<option value=$fa_id>". $fa_id ."</option>";
    }
?>

</select>
<button>DELETE</button>
</form>
<h2>Insert Flight Attendant </h2>
<form action="flight_attendant_insert.php" method="POST">
  <p>Flight Attendant ID:
  <input type="text" id="fa_id" name="fa_id" />
  Flight Attendant name:
  <input type="text" id="name" name="name" />
  <input type="submit" value="Submit" /></p>
</form>

<h2>All Flight Attendants </h2>

<?php 
echo "<table border='1' width='200px'>";
echo "<tr>";
echo "<th>Flight Attendant ID</th>";
echo "<th>Name</th>";
echo "</tr>";
include "config.php"; // Makes mysql connection
$result = mysqli_query($db, "SELECT * FROM flight_attendant"); // Executing query
while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $fa_id = $row['fa_id']; 
    $name = $row['name']; 
    echo "<tr>";
    echo "<td>$fa_id</td>";
    echo "<td>",$name,"</td>";
    echo "</tr>";
} 
echo "</table>";
?>

<p>
Make your selections:</p>

<form action="" method="POST">
  <select name = 'taskOption'>
    <option  value="fa_id">fa_id</option>
    <option  value="name">name</option>
  </select>
  =
  <input type="text" id="value" name="value" />
  <input type="submit" value="Show" /> <br />
</form>

<?php 
include "config.php"; // Makes mysql connection
$valid = 'no';
if (!empty($_POST['taskOption'])){ 
    $taskOption = $_POST['taskOption']; 
    echo "you selected:". $taskOption. "<br>";
    if (!empty($_POST['value'])){
        $value = $_POST['value'];
        if($taskOption === 'name'){
            $sql_statement = "SELECT * FROM `airport`.`flight_attendant` WHERE (CONVERT(`name` USING utf8) LIKE '%$value%')";
        }
        else{
            $sql_statement = "SELECT * FROM flight_attendant WHERE $taskOption='$value'";
        }
        $valid = 'yes';
    }
    if($valid == 'no'){
        echo "You did not fill the text box."."<br>";
    }
    else{
        $result = mysqli_query($db, $sql_statement); // Executing query
        echo "<table border='1' width='200px'>";
        echo "<tr>";
        echo "<th>Flight Attendant ID</th>";
        echo "<th>Name</th>";
        echo "</tr>";
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result
            $fa_id = $row['fa_id']; 
            $name = $row['name']; 
            echo "<tr>";
            echo "<td>$fa_id</td>";
            echo "<td>",$name,"</td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo"<a href='"."http://localhost/airport/flight_attendant_admin.php"."'>OK</a>"; 
    }
} 
else 
{
    echo "Please make a selection.";
}
?>