<?php
const HOST='127.0.0.1:3306';
//const DB_HOST_2='localhost:3306';
const USER='root';
const PASSWORD='';
const DATABASE = 'registeration';
$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
// or >> $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);

if ($conn->connect_errno > 0) {
    die('Unable to connect to database [' . $conn->connect_error . ']');
}
//$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);

//var_dump($conn);
//if(!$conn || $conn->connect_errno>0){
//    die(' <h3>unable to connect/h3> ');
//
//}else{
//    echo "<h3>connected successfully   </h3>";
//}
//$conn->select_db('registeration');
?>