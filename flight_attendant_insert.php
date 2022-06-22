<?php 

include "config.php"; 

if ((!empty($_POST['name']))&(!empty($_POST['fa_id']))){ 
    $name = $_POST['name']; 
    $fa_id = $_POST['fa_id']; 
    $sql_statement = "INSERT INTO flight_attendant (fa_id, name) VALUES ($fa_id, '$name');"; 
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/flight_attendant_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'."<br>"."<a href='"."http://localhost/airport/flight_attendant_admin.php"."'>OK</a>";
    }
} 
else 
{
    echo "You did not enter everything."."<br>"."<a href='"."http://localhost/airport/flight_attendant_admin.php"."'>OK</a>";
}

?>