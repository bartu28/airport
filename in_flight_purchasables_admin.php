<?php 
include "config.php";
?>

<h1>In Flight Purchasables Admin</h1>
<h2>Delete an In Flight Purchasable</h2>
<link rel="stylesheet" href="styles.css" />
<form action="in_flight_purchasables_delete.php" method="POST">
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
<button>DELETE</button>
</form>
<h2>Insert an In Flight Purchasable </h2>
<form action="in_flight_purchasables_insert.php" method="POST">
  <p>Price:
  <input type="text" id="price" name="price" />
  Name:
  <input type="text" id="name" name="name" />
  <input type="submit" value="Submit" /></p>
</form>

<h2>All In Flight Purchasabless </h2>

<?php 
echo "<table border='1' width='200px'>";
echo "<tr>";

echo "<th>Name</th>";
echo "<th>Price</th>";
echo "</tr>";
include "config.php"; // Makes mysql connection
$result = mysqli_query($db, "SELECT * FROM in_flight_purchasables"); // Executing query
while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $price = $row['price']; 
    $name = $row['name'];  
    echo "<tr>";
    
    echo "<td>",$name,"</td>";
    echo "<td>$price</td>";
    echo "</tr>";
} 
echo "</table>";
?>

<p>
Make your selections:</p>

<form action="" method="POST">
  <select name = 'taskOption'>
    <option  value="price">price</option>
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
            $sql_statement = "SELECT * FROM `airport`.`in_flight_purchasables` WHERE (CONVERT(`name` USING utf8) LIKE '%$value%')";
        }
        else{
            $sql_statement = "SELECT * FROM in_flight_purchasables WHERE $taskOption='$value'";
        }
        $valid = 'yes';
    }
    if($valid == 'no'){
        echo "You did not fill the text box."."<br>";
    }
    else{
        echo "<table border='1' width='200px'>";
        echo "<tr>";
        

        echo "<th>Name</th>";
        echo "<th>Price</th>";
        
        echo "</tr>";
        $result = mysqli_query($db, $sql_statement); // Executing query
        while($row = mysqli_fetch_assoc($result)) { // Iterating the result
            $name = $row['name']; 
            $price = $row['price']; 
            echo "<tr>";
            
            echo "<td>",$name,"</td>";
            echo "<td>$price</td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo "<a href='"."http://localhost/airport/in_flight_purchasables_admin.php"."'>OK</a>";
    }
} 
else 
{
    echo "Please make a selection."."<br>";
}
?>