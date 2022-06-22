<?php 
include "config.php";
?>

<h1>Operates Admin</h1>
<h2>Delete Operates Instance</h2>
<link rel="stylesheet" href="styles.css" />
<form action="operates_delete.php" method="POST">
<select name="p_id">

<?php
$sql_command = "SELECT plane_id, p_id FROM operates";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $plane_id = $id_rows['plane_id'];
        $p_id = $id_rows['p_id'];
        echo "<option value=$p_id> Pilot ID: ". $p_id . " operates Plane ID: " . $plane_id ."</option>";
    }
?>

</select>
<button>DELETE</button>
</form>
<h2>Insert Operates Instance </h2>
<form action="operates_insert.php" method="POST">
  <p>Pilot ID:
  <select name="p_id">

<?php
$sql_command = "SELECT p_id FROM pilot WHERE  p_id NOT IN (SELECT p_id FROM operates)";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $p_id = $id_rows['p_id'];
        echo "<option value=$p_id>". $p_id ."</option>";
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
?></p>

</select>
  <input type="submit" value="Submit" />
</form>

<h2>All Operates Instances </h2>

<?php 
echo "<table border='1' width='200px'>";
echo "<tr>";
echo "<th>Pilot ID</th>";
echo "<th>Plane ID</th>";
echo "</tr>";
include "config.php"; // Makes mysql connection
$result = mysqli_query($db, "SELECT * FROM operates"); // Executing query
while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $p_id = $row['p_id']; 
    $plane_id = $row['plane_id']; 
    
    echo "<tr>";
    echo "<td>$p_id</td>";
    echo "<td>",$plane_id,"</td>";
    echo "</tr>"; 
} 
echo "</table>";
?>

<p>
Make your selections:</p>

<form action="" method="POST">
  <select name = 'taskOption'>
    <option  value="p_id">p_id</option>
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
        $sql_statement = "SELECT * FROM operates WHERE $taskOption='$value'";
        $valid = 'yes';
    }
    if($valid == 'no'){
        echo "You did not fill the text box."."<br>";
    }
    else{
        echo "<table border='1' width='200px'>";
        echo "<tr>";
        echo "<th>Pilot ID</th>";
        echo "<th>Plane ID</th>";
        echo "</tr>";
        $result = mysqli_query($db, $sql_statement); // Executing query
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result
            $p_id = $row['p_id']; 
            $plane_id = $row['plane_id']; 
            echo "<tr>";
            echo "<td>$p_id</td>";
            echo "<td>",$plane_id,"</td>";
            echo "</tr>"; 
            
            
        } 
        echo "</table>";
        echo"<a href='"."http://localhost/airport/operates_admin.php"."'>OK</a>"; 
    }
} 
else 
{
    echo "Please make a selection.";
}
?>