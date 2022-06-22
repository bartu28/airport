<?php 

include "config.php"; 

if ((!empty($_POST['plane_id']))&(!empty($_POST['s_capacity']))&(!empty($_POST['model']))){ 
    $plane_id = $_POST['plane_id']; 
    $s_capacity = $_POST['s_capacity']; 
    $model = $_POST['model']; 
    $sql_statement = "INSERT INTO plane (plane_id, s_capacity, model) VALUES ($plane_id, $s_capacity, '$model');"; 
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/plane_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'."<br>"."<a href='"."http://localhost/airport/plane_admin.php"."'>OK</a>";
    }
} 
else 
{
    echo "You did not enter everything."."<br>"."<a href='"."http://localhost/airport/plane_admin.php"."'>OK</a>";
}

?>
