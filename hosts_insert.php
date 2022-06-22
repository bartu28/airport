<?php 

include "config.php"; 

if ((!empty($_POST['fa_id']))&(!empty($_POST['plane_id']))){ 
    $fa_id = $_POST['fa_id']; 
    $plane_id = $_POST['plane_id']; 
    $sql_statement = "INSERT INTO hosts (fa_id, plane_id) VALUES ($fa_id, $plane_id);"; 
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/hosts_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'."<br>"."<a href='"."http://localhost/airport/hosts_admin.php"."'>OK</a>";
    }
} 
else 
{
    echo "You did not enter everything."."<br>"."<a href='"."http://localhost/airport/hosts_admin.php"."'>OK</a>";
}

?>
