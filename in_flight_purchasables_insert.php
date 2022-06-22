<?php 

include "config.php"; 

if ((!empty($_POST['name']))&(!empty($_POST['price']))){ 
    $name = $_POST['name']; 
    $price = $_POST['price']; 
    $sql_statement = "INSERT INTO in_flight_purchasables (price, name) VALUES ('$price', '$name');"; 
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/in_flight_purchasables_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'."<br>"."<a href='"."http://localhost/airport/in_flight_purchasables_admin.php"."'>OK</a>";
    }
} 
else 
{
    echo "You did not enter everything."."<br>"."<a href='"."http://localhost/airport/in_flight_purchasables_admin.php"."'>OK</a>";
}

?>