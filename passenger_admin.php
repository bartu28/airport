<?php 
include "config.php";
?>
<link rel="stylesheet" href="styles.css" />
<h1>Passenger Admin</h1>
<h2>Delete Passenger</h2>

<form action="passenger_delete.php" method="POST">
<select name="id">

<?php
$sql_command = "SELECT id FROM passenger";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $id = $id_rows['id'];
        echo "<option value=$id>". $id ."</option>";
    }
?>

</select>
<button>DELETE</button>
</form>
<h2>Insert Passenger </h2>
<form action="passenger_insert.php" method="POST">
  <p>Passenger ID:
  <input type="text" id="id" name="id" />
  Passenger Age:
  <input type="text" id="age" name="age" />
  Name:
  <input type="text" id="name" name="name" />
  <input type="submit" value="Submit" /></p>
</form>

<h2>All Passengers </h2>

<?php 
echo "<table border='1' width='200px'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Age</th>";
echo "<th>Name</th>";
echo "</tr>";
include "config.php"; // Makes mysql connection
$result = mysqli_query($db, "SELECT * FROM passenger"); // Executing query
while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['id']; 
    $age = $row['age']; 
    $name = $row['name']; 
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>",$age,"</td>";
    echo "<td>",$name,"</td>";
    echo "</tr>";
} 
echo "</table>";
?>

<p>
Make your selections:</p>

<form action="" method="POST">
  <select name = 'taskOption'>
    <option  value="id">id</option>
    <option  value="name">name</option>
    <option  value="age">age</option>
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
            $sql_statement = "SELECT * FROM `airport`.`passenger` WHERE (CONVERT(`name` USING utf8) LIKE '%$value%')";
        }
        else{
            $sql_statement = "SELECT * FROM passenger WHERE $taskOption='$value'";
        }
        $valid = 'yes';
    }
    if($valid == 'no'){
        echo "You did not fill the text box."."<br>";
    }
    else{
        echo "<table border='1' width='200px'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Age</th>";
        echo "<th>Name</th>";
        echo "</tr>";
        $result = mysqli_query($db, $sql_statement); // Executing query
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result
            $id = $row['id']; 
            $name = $row['name']; 
            $age = $row['age']; 
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>",$age,"</td>";
            echo "<td>",$name,"</td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo"<a href='"."http://localhost/airport/passenger_admin.php"."'>OK</a>"; 
    }
} 
else 
{
    echo "Please make a selection.";
}
?>