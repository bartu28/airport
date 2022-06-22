<?php 

include "config.php"; 

if ((!empty($_POST['name']))&(!empty($_POST['p_id']))){ 
    $name = $_POST['name']; 
    $p_id = $_POST['p_id']; 
    $sql_statement = "INSERT INTO pilot (p_id, name) VALUES ($p_id, '$name');"; 
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/pilot_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'."<br>"."<a href='"."http://localhost/airport/pilot_admin.php"."'>OK</a>";
    }
} 
else 
{
    echo "You did not enter everything."."<br>"."<a href='"."http://localhost/airport/pilot_admin.php"."'>OK</a>";
}

?>