<?php
include_once('connection.php');
session_start();
$username=null;


    $sql = "SELECT content as k  FROM messages WHERE to_users_id = (SELECT id FROM users WHERE username = 'rana maged' );";
    $result=$conn->query($sql);
   // var_dump($result);
     $rows = $result->fetch_all(MYSQLI_ASSOC);
    // var_dump($rows);

          $con=$rows[1]['k'];
        //  echo $con;
 


?>
<html>
<style>
input[type=submit] {
        width: 35%;
        height:50px;
        background-color: darkcyan;
        color: white;
        padding: 17px 25px;
        margin: 8px ;
        margin-left: -15%;

        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=submit]:hover {
   4
        background-color: darksalmon;
    } 

 .headerContent{
            padding-left: 200px;
            padding-top: 10px;

        }
</style>
<body style="background-color:#f2f2f2">
    <div class="headerContent">
        <p1 style=" font-size:39px; font-family: italic; color:black;" ><h2> Welcome Saraha </h2></p1><br>
        <!-- <p2 style=" font-size:12px; font-family: monospace; color:#333e63;"> Anonymous messages</p2> -->
       
        <div class="no"></div>
    </div>
    <div style="width: 20%; float: right" >
     <form style="width: 400px; margin-right: 10%;" action="loginPage.php"> <input type="submit" value="LogOut"> </form>
 </div>
	<form method="POST">
		<h2 style="color: darkcyan ;  margin-top: 7%;margin-left:30%; font-size: 60px; font-style: italic;">Your Message </h2>
       <div style="width: 400px; border-color: black;  margin-left: 30%; height: 150px; background-color: #ccc; font-size: 30px; color: red; font-family:sans-serif; "> <?php echo $con; ?>      </div>
           
	</form>
	</body>
	</html>