<?php 
include "config.php";
?>

<h1>Plane Admin</h1>
<h2>Delete Plane</h2>
<link rel="stylesheet" href="styles.css" />
<form action="plane_delete.php" method="POST">
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
<button>DELETE</button>
</form>
<h2>Insert Plane </h2>
<form action="plane_insert.php" method="POST">
  <p>Plane ID:
  <input type="text" id="plane_id" name="plane_id" />
  Seating Capacity:
  <input type="text" id="s_capacity" name="s_capacity" />
  Model:
  <input type="text" id="model" name="model" />
  <input type="submit" value="Submit" /></p>
</form>

<h2>All Planes </h2>

<?php 
echo "<table border='1' width='200px'>";
echo "<tr>";
echo "<th>Plane ID</th>";
echo "<th>Seating Capacity</th>";
echo "<th>Model</th>";
echo "</tr>";
include "config.php"; // Makes mysql connection
$result = mysqli_query($db, "SELECT * FROM plane"); // Executing query
while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $plane_id = $row['plane_id']; 
    $s_capacity = $row['s_capacity']; 
    $model = $row['model']; 
    echo "<tr>";
    echo "<td>$plane_id</td>";
    echo "<td>",$s_capacity,"</td>";
    echo "<td>",$model,"</td>";
    echo "</tr>";
} 
echo "</table>";
?>

<p>
Make your selections:</p>

<form action="" method="POST">
  <select name = 'taskOption'>
    <option  value="plane_id">plane_id</option>
    <option  value="model">model</option>
    <option  value="s_capacity">s_capacity</option>
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
        if($taskOption === 'model'){
            $sql_statement = "SELECT * FROM `airport`.`plane` WHERE (CONVERT(`model` USING utf8) LIKE '%$value%')";
        }
        else{
            $sql_statement = "SELECT * FROM plane WHERE $taskOption='$value'";
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
        echo "<th>Seating Capacity</th>";
        echo "<th>Model</th>";
        echo "</tr>";
        $result = mysqli_query($db, $sql_statement); // Executing query
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result
            $plane_id = $row['plane_id']; 
            $model = $row['model']; 
            $s_capacity = $row['s_capacity']; 
            echo "<tr>";
            echo "<td>$plane_id</td>";
            echo "<td>",$s_capacity,"</td>";
            echo "<td>",$model,"</td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo"<a href='"."http://localhost/airport/plane_admin.php"."'>OK</a>"; 
    }
} 
else 
{
    echo "Please make a selection.";
}
?>