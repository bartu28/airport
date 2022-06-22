<?php 
include "config.php";
?>
<h1>Pilot Admin</h1>
<h2>Delete Pilot</h2>
<link rel="stylesheet" href="styles.css" />
<form action="pilot_delete.php" method="POST">
<select name="p_id">

<?php
$sql_command = "SELECT p_id FROM pilot";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $p_id = $id_rows['p_id'];
        echo "<option value=$p_id>". $p_id ."</option>";
    }
?>

</select>
<button>DELETE</button>
</form>
<h2>Insert Pilot</h2>
<form action="pilot_insert.php" method="POST">
  <p>Pilot id:
  <input type="text" id="p_id" name="p_id" />
  Pilot Name:
  <input type="text" id="name" name="name" />
  <input type="submit" value="Submit" /></p>
</form>

<h2>All Pilots</h2>

<?php 
echo "<table border='1' width='200px'>";
echo "<tr>";
echo "<th>Pilot ID</th>";
echo "<th>Name</th>";
echo "</tr>";

include "config.php"; // Makes mysql connection
$result = mysqli_query($db, "SELECT * FROM pilot"); // Executing query
while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $p_id = $row['p_id']; 
    $name = $row['name'];  
    echo "<tr>";
    echo "<td>$p_id</td>";
    echo "<td>",$name,"</td>";
    echo "</tr>";
    //echo $p_id . " " . $name . "<br>"; 
} 
echo "</table>";
?>

<p>
Make your selections:</p>

<form action="" method="POST">
  <select name = 'taskOption'>
    <option  value="p_id">p_id</option>
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
            $sql_statement = "SELECT * FROM `airport`.`pilot` WHERE (CONVERT(`name` USING utf8) LIKE '%$value%')";
        }
        else{
            $sql_statement = "SELECT * FROM pilot WHERE $taskOption='$value'";
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
        echo "<th>Pilot ID</th>";
        echo "<th>Name</th>";
        echo "</tr>";
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result
            $name = $row['name']; 
            $p_id = $row['p_id']; 
            echo "<tr>";
            echo "<td>$p_id</td>";
            echo "<td>",$name,"</td>";
            echo "</tr>";
            
            
            //echo $p_id . " "  . " " . $name . "<br>"; 
        } 
        echo "</table>";
        echo "<a href='"."http://localhost/airport/pilot_admin.php"."'>OK</a>";
    }
} 
else 
{
    echo "Please make a selection."."<br>";
}




?>