<?php

include "config.php";

if(!empty($_POST['p_id']))
{
    $p_id = $_POST['p_id'];
    $sql_statement = "DELETE FROM pilot WHERE p_id = $p_id";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/pilot_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'. $db->error."<br>"."<a href='"."http://localhost/airport/pilot_admin.php"."'>OK</a>";

    }
}
else{
    echo "Error: delete.php:" .$db->error."<br>"."<a href='"."http://localhost/airport/pilot_admin.php"."'>OK</a>";
}

?>