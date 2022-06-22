<?php 

include "config.php"; 

if ((!empty($_POST['plane_id']))&(!empty($_POST['name']))&(!empty($_POST['parking_lot']))){ 
    $plane_id = $_POST['plane_id']; 
    $name = $_POST['name'];
    $parking_lot = $_POST['parking_lot'];
    $sql_statement = "INSERT INTO parks_at (plane_id, name, parking_lot) VALUES ($plane_id, '$name', '$parking_lot');"; 
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
    if ( false===$result ) {
        echo "Error:" .$db->error."<br>"."<a href='"."http://localhost/airport/parks_at_admin.php"."'>OK</a>";
    }
    else {
        echo ' done.'."<br>"."<a href='"."http://localhost/airport/parks_at_admin.php"."'>OK</a>";
    }
} 
else 
{
    echo "You did not enter everything."."<br>"."<a href='"."http://localhost/airport/parks_at_admin.php"."'>OK</a>";
}

?>
