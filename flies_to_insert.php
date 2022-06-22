<?php 

include "config.php"; 

if ((!empty($_POST['plane_id']))&(!empty($_POST['name']))){ 
    $plane_id = $_POST['plane_id']; 
    $name = $_POST['name']; 
    $sql_statement = "INSERT INTO flies_to (plane_id, name) VALUES ($plane_id, '$name');"; 
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/flies_to_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'."<br>"."<a href='"."http://localhost/airport/flies_to_admin.php"."'>OK</a>";
    }
} 
else 
{
    echo "You did not enter everything."."<br>"."<a href='"."http://localhost/airport/flies_to_admin.php"."'>OK</a>";
}

?>
