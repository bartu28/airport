<?php 
include "config.php";
?>
<link rel="stylesheet" href="styles.css" />
<h1>Parks at Admin</h1>
<h2>Delete Parks at Instance</h2>

<form action="parks_at_delete.php" method="POST">
<select name="plane_id">

<?php
$sql_command = "SELECT * FROM parks_at";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $plane_id = $id_rows['plane_id'];
        $name = $id_rows['name'];
        $parking_lot = $id_rows['parking_lot'];
        echo "<option value=$plane_id>". $plane_id . " parks at " . $name. " - Lot ". $parking_lot ."</option>";
    }
?>

</select>
<button>DELETE</button>
</form>
<h2>Insert Parks at Instance </h2>
<form action="parks_at_insert.php" method="POST">
  <p>Plane ID:
  <select name="plane_id">

<?php
$sql_command = "SELECT plane_id FROM plane WHERE  plane_id NOT IN (SELECT plane_id FROM parks_at) AND plane_id NOT IN (SELECT plane_id FROM flies_to)";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $plane_id = $id_rows['plane_id'];
        echo "<option value=$plane_id>". $plane_id ."</option>";
    }
?>

</select>
  Airport Name:
  <select name="name">

<?php
$sql_command = "SELECT name FROM airport";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $name = $id_rows['name'];
        echo "<option value=$name>". $name ."</option>";
    }
?>
</select>
  Parking Lot:
  <input type="text" id="parking_lot" name="parking_lot" />

</select>
  <input type="submit" value="Submit" /></p>
</form>

<h2>All Flies to Instances </h2>

<?php 
echo "<table border='1' width='200px'>";
echo "<tr>";
echo "<th>Plane ID</th>";
echo "<th>Name</th>";
echo "<th>Parking Lot</th>";
echo "</tr>";
include "config.php"; // Makes mysql connection
$result = mysqli_query($db, "SELECT * FROM parks_at"); // Executing query
while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $plane_id = $row['plane_id']; 
    $name = $row['name']; 
    $parking_lot = $row['parking_lot']; 
    
    echo "<tr>";
    echo "<td>$plane_id</td>";
    echo "<td>",$name,"</td>";
    echo "<td>",$parking_lot,"</td>";
    echo "</tr>";
} 
echo "</table>";
?>

<p>
Make your selections:</p >

<form action="" method="POST">
  <select name = 'taskOption'>
    <option  value="plane_id">plane_id</option>
    <option  value="name">name</option>
    <option  value="parking_lot">parking lot</option>
    
    
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
            $sql_statement = "SELECT * FROM `airport`.`parks_at` WHERE (CONVERT(`name` USING utf8) LIKE '%$value%')";
        }
        else{
            $sql_statement = "SELECT * FROM parks_at WHERE $taskOption='$value'";
        }
        $valid = 'yes';
    }
    if($valid == 'no'){
        echo "You did not fill the text box."."<br>";
    }
    else{
        echo "<table border='1' width='200px'>";
        echo "<tr>";
        echo "<th>Plane ID</th>";
        echo "<th>Name</th>";
        echo "<th>Parking Lot</th>";
        echo "</tr>";
        $result = mysqli_query($db, $sql_statement); // Executing query
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result
            $plane_id = $row['plane_id']; 
            $name = $row['name']; 
            $parking_lot = $row['parking_lot']; 
            
            echo "<tr>";
            echo "<td>$plane_id</td>";
            echo "<td>",$name,"</td>";
            echo "<td>",$parking_lot,"</td>";
            echo "</tr>";
        } 
        echo "</table>";

        echo"<a href='"."http://localhost/airport/parks_at_admin.php"."'>OK</a>"; 
    }
} 
else 
{
    echo "Please make a selection.";
}
?>