<?php

include "config.php";

if(!empty($_POST['name']))
{
    $name = $_POST['name'];
    $sql_statement = "DELETE FROM airport WHERE name = '$name'";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/airport_admin.php"."'>OK</a>"; 
    }
    else {
        echo ' done.'. $db->error."<br>"."<a href='"."http://localhost/airport/airport_admin.php"."'>OK</a>"; 

    }
}
else{
    echo "Error: delete.php:" .$db->error."<br>"."<a href='"."http://localhost/airport/airport_admin.php"."'>OK</a>"; 
}

?>