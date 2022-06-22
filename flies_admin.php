<?php 
include "config.php";
?>
<link rel="stylesheet" href="styles.css" />
<h1>Flies Admin</h1>
<h2>Delete Flies Instance</h2>

<form action="flies_delete.php" method="POST">
<select name="id">

<?php
$sql_command = "SELECT plane_id, id FROM flies";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $plane_id = $id_rows['plane_id'];
        $id = $id_rows['id'];
        echo "<option value=$id>". $id . " flies with plane ID: " . $plane_id ."</option>";
    }
?>

</select>
<button>DELETE</button>
</form>
<h2>Insert Flies Instance </h2>
<form action="flies_insert.php" method="POST">
  <p>Passenger ID:
  <select name="id">

<?php
$sql_command = "SELECT id FROM passenger WHERE  id NOT IN (SELECT id FROM flies)";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $id = $id_rows['id'];
        echo "<option value=$id>". $id ."</option>";
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
</form> </p>

<h2>All flies Instances </h2>

<?php 
echo "<table border='1' width='200px'>";
echo "<tr>";
echo "<th>Passenger ID</th>";
echo "<th>Plane ID</th>";
echo "</tr>";
include "config.php"; // Makes mysql connection
$result = mysqli_query($db, "SELECT * FROM flies"); // Executing query
while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['id']; 
    $plane_id = $row['plane_id']; 
    
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>",$plane_id,"</td>";
    echo "</tr>";
} 
echo "</table>";
?>

<p>
Make your selections:</p>

<form action="" method="POST">
  <select name = 'taskOption'>
    <option  value="id">id</option>
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
        $sql_statement = "SELECT * FROM flies WHERE $taskOption='$value'";
        $valid = 'yes';
    }
    if($valid == 'no'){
        echo "You did not fill the text box."."<br>";
    }
    else{
        echo "<table border='1' width='200px'>";
        echo "<tr>";
        echo "<th>Passenger ID</th>";
        echo "<th>Plane ID</th>";
        echo "</tr>";
        $result = mysqli_query($db, $sql_statement); // Executing query
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result
            $id = $row['id']; 
            $plane_id = $row['plane_id']; 
            
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>",$plane_id,"</td>";
            echo "</tr>";
        }
        echo "</table>"; 
        echo"<a href='"."http://localhost/airport/flies_admin.php"."'>OK</a>"; 
    }
} 
else 
{
    echo "Please make a selection.";
}
?>