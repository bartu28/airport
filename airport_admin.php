<?php 
include "config.php";
?>

<h1>Airport Admin</h1>
<h2>Delete Airport</h2>
<link rel="stylesheet" href="styles.css" />
<form action="airport_delete.php" method="POST">
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
<button>DELETE</button>
</form>
<h2>Insert Airport </h2>
<form action="airport_insert.php" method="POST">
  Plane capacity:
  <input type="text" id="p_capacity" name="p_capacity" />
  Address:
  <input type="text" id="address" name="address" />
  Name:
  <input type="text" id="name" name="name" />
  <input type="submit" value="Submit" />
</form>

<h2>All Airports </h2>

<?php 
echo "<table border='1' width='200px'>";
echo "<tr>";
echo "<th>Airport Name</th>";
echo "<th>Address</th>";
echo "<th>Plane Capacity</th>";
echo "</tr>";
include "config.php"; // Makes mysql connection
$result = mysqli_query($db, "SELECT * FROM airport"); // Executing query
while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $p_capacity = $row['p_capacity']; 
    $address = $row['address']; 
    $name = $row['name']; 
    echo "<tr>";
    echo "<td>$name</td>";
    echo "<td>",$address,"</td>";
    echo "<td>",$p_capacity,"</td>";
    echo "</tr>";
} 
echo "</table>";
?>

<p>
Make your selections:</p>

<form action="" method="POST">
  <select name = 'taskOption'>
    <option  value="p_capacity">p_capacity</option>
    <option  value="address">address</option>
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
            $sql_statement = "SELECT * FROM `airport`.`airport` WHERE (CONVERT(`name` USING utf8) LIKE '%$value%')";
        }
        elseif($taskOption === 'address'){
            $sql_statement = "SELECT * FROM `airport`.`airport` WHERE (CONVERT(`address` USING utf8) LIKE '%$value%')";
        }
        else{
            $sql_statement = "SELECT * FROM airport WHERE $taskOption='$value'";
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
        echo "<th>Airport Name</th>";
        echo "<th>Address</th>";
        echo "<th>Plane Capacity</th>";
        echo "</tr>";
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result
            $p_capacity = $row['p_capacity']; 
            $address = $row['address']; 
            $name = $row['name']; 
            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>",$address,"</td>";
            echo "<td>",$p_capacity,"</td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo"<a href='"."http://localhost/airport/airport_admin.php"."'>OK</a>"; 
    }
} 
else 
{
    echo "Please make a selection.";
}
?>