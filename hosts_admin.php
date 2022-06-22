<?php 
include "config.php";
?>

<h1>Hosts Admin</h1>
<h2>Delete Hosts Instance</h2>
<link rel="stylesheet" href="styles.css" />
<form action="hosts_delete.php" method="POST">
<select name="fa_id">

<?php
$sql_command = "SELECT plane_id, fa_id FROM hosts";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $plane_id = $id_rows['plane_id'];
        $fa_id = $id_rows['fa_id'];
        echo "<option value=$fa_id> FA ID: ". $fa_id . " hosts in Plane ID: " . $plane_id ."</option>";
    }
?>

</select>
<button>DELETE</button>
</form>
<h2>Insert Hosts Instance </h2>
<form action="hosts_insert.php" method="POST">
  <p>Flight Attendant ID:
  <select name="fa_id">

<?php
$sql_command = "SELECT fa_id FROM flight_attendant WHERE  fa_id NOT IN (SELECT fa_id FROM hosts)";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $fa_id = $id_rows['fa_id'];
        echo "<option value=$fa_id>". $fa_id ."</option>";
    }
?>

</select>
  Plane ID:
  <select name="plane_id">

<?php
$sql_command = "SELECT plane_id FROM plane";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $plane_id = $id_rows['plane_id'];
        echo "<option value=$plane_id>". $plane_id ."</option>";
    }
?>

</select>
  <input type="submit" value="Submit" />
</form></p>

<h2>All Hosts Instances </h2>

<?php 
echo "<table border='1' width='200px'>";
echo "<tr>";
echo "<th>Flight Attendant ID</th>";
echo "<th>Plane ID</th>";
echo "</tr>";
include "config.php"; // Makes mysql connection
$result = mysqli_query($db, "SELECT * FROM hosts"); // Executing query
while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $fa_id = $row['fa_id']; 
    $plane_id = $row['plane_id']; 
    
    echo "<tr>";
    echo "<td>$fa_id</td>";
    echo "<td>",$plane_id,"</td>";
    echo "</tr>";
} 
echo "</table>";
?>

<p>
Make your selections:</p>

<form action="" method="POST">
  <select name = 'taskOption'>
    <option  value="fa_id">fa_id</option>
    <option  value="plane_id">plane_id</option>
    
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
        $sql_statement = "SELECT * FROM hosts WHERE $taskOption='$value'";
        $valid = 'yes';
    }
    if($valid == 'no'){
        echo "You did not fill the text box."."<br>";
    }
    else{
        echo "<table border='1' width='200px'>";
        echo "<tr>";
        echo "<th>Flight Attendant ID</th>";
        echo "<th>Plane ID</th>";
        echo "</tr>";
        $result = mysqli_query($db, $sql_statement); // Executing query
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result
            $fa_id = $row['fa_id']; 
            $plane_id = $row['plane_id']; 
            
            echo "<tr>";
            echo "<td>$fa_id</td>";
            echo "<td>",$plane_id,"</td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo"<a href='"."http://localhost/airport/hosts_admin.php"."'>OK</a>"; 
    }
} 
else 
{
    echo "Please make a selection.";
}
?>