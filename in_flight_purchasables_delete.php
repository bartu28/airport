<?php

include "config.php";

if(!empty($_POST['name']))
{
    $name = $_POST['name'];
    $sql_statement = "DELETE FROM in_flight_purchasables WHERE name = '$name'";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/in_flight_purchasables_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'. $db->error."<br>"."<a href='"."http://localhost/airport/in_flight_purchasables_admin.php"."'>OK</a>";

    }
}
else{
    echo "Error: delete.php:" .$db->error."<br>"."<a href='"."http://localhost/airport/in_flight_purchasables_admin.php"."'>OK</a>";
}

?>