<?php 

include "config.php"; 

if ((!empty($_POST['id']))&(!empty($_POST['plane_id']))){ 
    $id = $_POST['id']; 
    $plane_id = $_POST['plane_id']; 
    $sql_statement = "INSERT INTO flies (id, plane_id) VALUES ($id, $plane_id);"; 
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/flies_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'."<br>"."<a href='"."http://localhost/airport/flies_admin.php"."'>OK</a>";
    }
} 
else 
{
    echo "You did not enter everything."."<br>"."<a href='"."http://localhost/airport/flies_admin.php"."'>OK</a>";
}

?>
