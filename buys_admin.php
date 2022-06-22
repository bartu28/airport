<?php 
include "config.php";
?>

<h1>Buys Admin</h1>
<h2>Delete Buys Instance</h2>
<link rel="stylesheet" href="styles.css" />
<form action="buys_delete.php" method="POST">
<select name="value[]">

<?php
$sql_command = "SELECT name, id FROM buys";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $name = $id_rows['name'];
        $id = $id_rows['id'];
        echo "<option value='$id $name'>". $id ." - ". $name."</option>";
    }
?>

</select>
<button>DELETE</button>
</form>
<h2>Insert buys </h2>
<form action="buys_insert.php" method="POST">
  <p>Purchaser ID:
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
  Quantity:
  <input type="text" id="quantity" name="quantity" />
  Product name:
  <select name="name">

<?php
$sql_command = "SELECT name FROM in_flight_purchasables";
$myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $name = $id_rows['name'];
        echo "<option value=$name>". $name ."</option>";
    }
?>

</select>
  <input type="submit" value="Submit" /></p>
</form>

<h2>All Purchases </h2>

<?php 
echo "<table border='1' width='200px'>";
echo "<tr>";
echo "<th>Purchasable ID</th>";
echo "<th>Name</th>";
echo "<th>Quantity</th>";

echo "</tr>";
include "config.php"; // Makes mysql connection
$result = mysqli_query($db, "SELECT * FROM buys"); // Executing query
while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $id = $row['id']; 
    $quantity = $row['quantity']; 
    $name = $row['name']; 
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>",$name,"</td>";
    echo "<td>",$quantity,"</td>";
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
    <option  value="quantity">quantity</option>
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
            $sql_statement = "SELECT * FROM `airport`.`buys` WHERE (CONVERT(`name` USING utf8) LIKE '%$value%')";
        }
        else{
            $sql_statement = "SELECT * FROM buys WHERE $taskOption='$value'";
        }
        $valid = 'yes';
    }
    if($valid == 'no'){
        echo "You did not fill the text box."."<br>";
    }
    else{
        echo "<table border='1' width='200px'>";
        echo "<tr>";
        echo "<th>Purchasable ID</th>";
        echo "<th>Name</th>";
        echo "<th>Quantity</th>";
        $result = mysqli_query($db, $sql_statement); // Executing query
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result
            $id = $row['id']; 
            $name = $row['name']; 
            $quantity = $row['quantity']; 
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>",$name,"</td>";
            echo "<td>",$quantity,"</td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo"<a href='"."http://localhost/airport/buys_admin.php"."'>OK</a>"; 
    }
} 
else 
{
    echo "Please make a selection.";
}
?>