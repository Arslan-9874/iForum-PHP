<?php 

$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'iforum';

$conn = mysqli_connect($servername, $username, $password, $db_name);

if(!$conn)
{
    echo 'Error: ' . mysqli_connect_error();
    die();
}

?>