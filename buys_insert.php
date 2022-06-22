<?php 

include "config.php"; 

if ((!empty($_POST['id']))&(!empty($_POST['quantity']))&(!empty($_POST['name']))){ 
    $id = $_POST['id']; 
    $quantity = $_POST['quantity']; 
    $name = $_POST['name']; 
    $sql_statement = "INSERT INTO buys (id, quantity, name) VALUES ($id, $quantity, '$name');"; 
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/buys_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'."<br>"."<a href='"."http://localhost/airport/buys_admin.php"."'>OK</a>";
    }
} 
else 
{
    echo "You did not enter everything."."<br>"."<a href='"."http://localhost/airport/buys_admin.php"."'>OK</a>";
}

?>
