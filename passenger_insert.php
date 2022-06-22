<?php 

include "config.php"; 

if ((!empty($_POST['id']))&(!empty($_POST['age']))&(!empty($_POST['name']))){ 
    $id = $_POST['id']; 
    $age = $_POST['age']; 
    $name = $_POST['name']; 
    $sql_statement = "INSERT INTO passenger (id, age, name) VALUES ($id, $age, '$name');"; 
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/passenger_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'."<br>"."<a href='"."http://localhost/airport/passenger_admin.php"."'>OK</a>";
    }
} 
else 
{
    echo "You did not enter everything."."<br>"."<a href='"."http://localhost/airport/passenger_admin.php"."'>OK</a>";
}

?>
