
<?php 

include "config.php"; 

if ((!empty($_POST['name']))&(!empty($_POST['p_capacity']))&(!empty($_POST['address']))){ 
    $p_capacity = $_POST['p_capacity']; 
    $address = $_POST['address']; 
    $name = $_POST['name']; 
    $sql_statement = "INSERT INTO airport (p_capacity, address, name) VALUES ($p_capacity, '$address', '$name');"; 
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/airport_admin.php"."'>OK</a>"; 
    }
    else {
        echo ' done.'."<br>"."<a href='"."http://localhost/airport/airport_admin.php"."'>OK</a>"; 
    }
} 
else 
{
    echo "You did not enter everything."."<br>"."<a href='"."http://localhost/airport/airport_admin.php"."'>OK</a>"; 
}

?>
