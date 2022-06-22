<?php

include "config.php";

if(!empty($_POST['plane_id']))
{
    $plane_id = $_POST['plane_id'];
    $sql_statement = "DELETE FROM flies_to WHERE plane_id = '$plane_id'";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/flies_to_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'. $db->error."<br>"."<a href='"."http://localhost/airport/flies_to_admin.php"."'>OK</a>";

    }
}
else{
    echo "Error: delete.php:" .$db->error."<br>"."<a href='"."http://localhost/airport/flies_to_admin.php"."'>OK</a>";
}

?>