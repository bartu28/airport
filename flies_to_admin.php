<?php
include "config.php";
?>
<link rel="stylesheet" href="styles.css" />
<h1>Flies to Admin</h1>
<h2>Delete Flies to Instance</h2>

<form action="flies_to_delete.php" method="POST">
    <select name="plane_id">

        <?php
        $sql_command = "SELECT plane_id, name FROM flies_to";
        $myresult = mysqli_query($db, $sql_command);
        while ($id_rows = mysqli_fetch_assoc($myresult)) {
            $plane_id = $id_rows['plane_id'];
            $name = $id_rows['name'];
            echo "<option value=$plane_id>" . $plane_id . " flies to " . $name . "</option>";
        }
        ?>

    </select>
    <button>DELETE</button>
</form>
<h2>Insert Flies to </h2>
<form action="flies_to_insert.php" method="POST">
    <p>Plane ID:
        <select name="plane_id">

            <?php
            $sql_command = "SELECT plane_id FROM plane WHERE  plane_id NOT IN (SELECT plane_id FROM flies_to) AND plane_id NOT IN (SELECT plane_id FROM parks_at) AND plane_id IN (SELECT plane_id FROM operates)";
            $myresult = mysqli_query($db, $sql_command);
            while ($id_rows = mysqli_fetch_assoc($myresult)) {
                $plane_id = $id_rows['plane_id'];
                echo "<option value=$plane_id>" . $plane_id . "</option>";
            }
            ?>

        </select>
        Airport Name
        <select name="name">

            <?php
            $sql_command = "SELECT name FROM airport";
            $myresult = mysqli_query($db, $sql_command);
            while ($id_rows = mysqli_fetch_assoc($myresult)) {
                $name = $id_rows['name'];
                echo "<option value=$name>" . $name . "</option>";
            }
            ?>

        </select>
        <input type="submit" value="Submit" />
</form>
</p>

<h2>All Flies to Instances </h2>

<?php
echo "<table border='1' width='200px'>";
echo "<tr>";
echo "<th>Plane ID</th>";
echo "<th>Name</th>";
echo "</tr>";
include "config.php"; // Makes mysql connection
$result = mysqli_query($db, "SELECT * FROM flies_to"); // Executing query
while ($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $plane_id = $row['plane_id'];
    $name = $row['name'];

    echo "<tr>";
    echo "<td>$plane_id</td>";
    echo "<td>", $name, "</td>";
    echo "</tr>";
}
echo "</table>";
?>

<p>
    Make your selections:</p>

<form action="" method="POST">
    <select name='taskOption'>
        <option value="plane_id">plane_id</option>
        <option value="name">name</option>

    </select>
    =
    <input type="text" id="value" name="value" />
    <input type="submit" value="Show" /> <br />
</form>

<?php
include "config.php"; // Makes mysql connection
$valid = 'no';
if (!empty($_POST['taskOption'])) {
    $taskOption = $_POST['taskOption'];
    echo "you selected:" . $taskOption . "<br>";
    if (!empty($_POST['value'])) {
        $value = $_POST['value'];
        if ($taskOption === 'name') {
            $sql_statement = "SELECT * FROM `airport`.`flies_to` WHERE (CONVERT(`name` USING utf8) LIKE '%$value%')";
        } else {
            $sql_statement = "SELECT * FROM flies_to WHERE $taskOption='$value'";
        }
        $valid = 'yes';
    }
    if ($valid == 'no') {
        echo "You did not fill the text box." . "<br>";
    } else {
        echo "<table border='1' width='200px'>";
        echo "<tr>";
        echo "<th>Plane ID</th>";
        echo "<th>Name</th>";
        echo "</tr>";
        $result = mysqli_query($db, $sql_statement); // Executing query
        while ($row = mysqli_fetch_assoc($result)) { // Iterating the result
            $plane_id = $row['plane_id'];
            $name = $row['name'];

            echo "<tr>";
            echo "<td>$plane_id</td>";
            echo "<td>", $name, "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a href='" . "http://localhost/airport/flies_to_admin.php" . "'>OK</a>";
    }
} else {
    echo "Please make a selection.";
}
?>