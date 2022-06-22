<?php

include "config.php";

if(!empty($_POST['fa_id']))
{
    $fa_id = $_POST['fa_id'];
    $sql_statement = "DELETE FROM flight_attendant WHERE fa_id = $fa_id";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/flight_attendant_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'. $db->error."<br>"."<a href='"."http://localhost/airport/flight_attendant_admin.php"."'>OK</a>";

    }
}
else{
    echo "Error: delete.php:" .$db->error."<br>"."<a href='"."http://localhost/airport/flight_attendant_admin.php"."'>OK</a>";
}

?>