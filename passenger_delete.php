<?php

include "config.php";

if(!empty($_POST['id']))
{
    $id = $_POST['id'];
    $sql_statement = "DELETE FROM passenger WHERE id = '$id'";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/passenger_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'. $db->error."<br>"."<a href='"."http://localhost/airport/passenger_admin.php"."'>OK</a>";

    }
}
else{
    echo "Error: delete.php:" .$db->error."<br>"."<a href='"."http://localhost/airport/passenger_admin.php"."'>OK</a>";
}

?>