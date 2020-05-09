<?php

session_start();
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
if (!isset($_SESSION["user"])) {
    header("Refresh:1; url=login.html", true, 303);

}
include "connectionDoctorDB.php";
$query="select * from Doctor";
$result=mysql_query($query);
?>

<!DOCTYPE html>
<html>
    <title>
        <head> Fetch data from database</head>
    </title>
<tr>
<table   align="center" border="1px" style="width:600px; line-height:40px;" ">
        <tr>
            <th><h2>doctor</h2></th>
            <th>Name</th>
            <th>Title</th>
            <th>Bio</th>
            <th>Picture</th>
        </tr>
        <t>
            <th>ID</th>
            <th>Name</th>
            <th>Title</th>
            <th>Bio</th>
            <th>Picture</th>
        </t>
<?php
while($rows=mysql_fetch_assoc($result))
{
?>

<tr>
    <td><?php echo $rows['ID'] ?></td>
    <td><?php echo $rows['Name'] ?></td>
    <td><?php echo $rows['Title'] ?></td>
    <td><?php echo $rows['Bio'] ?></td>
    <td><?php echo $rows['Picture'] ?></td>
</tr>
    <?php
}
    ?>


    </table>
</body>

</html>