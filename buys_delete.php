<?php

include "config.php";

if(!empty($_POST['value']))
{
   
    

    $buys_id = $_POST['value'][0];
    
    $id = explode(" ",$buys_id)[0];
    
    $name = explode(" ",$buys_id)[1];

    $sql_statement = "DELETE FROM buys WHERE id = '$id' AND name = '$name'";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/buys_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'. $db->error."<br>"."<a href='"."http://localhost/airport/buys_admin.php"."'>OK</a>";

    }
}
else{
    echo "Error: delete.php:" .$db->error."<br>"."<a href='"."http://localhost/airport/buys_admin.php"."'>OK</a>";
}

?>