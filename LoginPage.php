<?php
require ("connection.php");
session_start();
 $errors = [
    'name' => [],
    'password' => [],
    'auth'=>[]
];
$username=NULL;
if(isset($_POST['username'])) {
    $username = $_POST['username'];
    if (strlen( $username ) < 6) {
        array_push( $errors['name'], '&nbsp&nbsp&nbsp &nbsp password less than 6 characters !!' );
    }
}
$password=NULL;
if(isset($_POST['password'])){
    $password=$_POST['password'];
    if(strlen($password)<6){
        array_push($errors['password'],'&nbsp&nbsp&nbsp &nbsp'.'password less than 6 characters !!');
    }
}

if (count($errors['name']) == 0 &&
    count($errors['password']) == 0 && $password && $username ) { 

 $sql = " SELECT COUNT(*)  as k FROM users WHERE username = '$username' AND password = '$password';"; 
$result=$conn->query($sql);
//var_dump($result);
$rows=$result->fetch_all(MYSQLI_ASSOC);
$isfound=$rows[0]['k'];

if(strcmp($isfound, "1") == 0) {
   $_SESSION['isLogged'] = true;
       
     header('Location:http://localhost/home.php');
}else{
    echo "string";
       $_SESSION['isLogged'] = false;

      header('Location:http://localhost/index.php');
        }
}
?>
<!DOCTYPE html>
<html>
<style>
    body{
        background-color: #f2f2f2;
    }
    input[type=text], select {
        width:60%;
        height:50px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=submit] {
        width: 70%;
        height:50px;
        background-color: darkcyan;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=submit]:hover {
        background-color: darksalmon;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
    h1{
        color: #e9c429;
        font-family: "Arial Rounded MT Bold";
        font-size: xx-large;
        padding-top: 12px;
        text-align: center;
    }
</style>
<body>
 <div style="width: 20%; float: right" >
     <form action="register.php"> <input type="submit" value="Register"> </form>
 </div>
<div style="padding: 6%; padding-left: 300px">
     

    <form action=""  method="post"  >
          <?php if (count($errors['name']) > 0 || count($errors['password'])>0 ) { ?>
             
    <div style="width: 250px; height: 18px; background-color:red; margin-left: 20%; font-size: 20px "> <b  style="padding-left: 20% "> sorry, Not User!!   </b>   </div>
    <?php } ?>
        <label for="fname" style="color: darkcyan"><b>Your Name</b></label>
        <input type="text" id="fname" name="username" placeholder="  Your username.."><br>
        <?php if (isset($errors) && count($errors['name']) > 0) { ?>
            <?php foreach ($errors['name'] as $k=>$v){ ?>
           <p style="color: red">   <?php echo $v; ?></p>
        <?php } ?>
        <?php } ?>
        <label for="fname" style="color: darkcyan"><b>Password &nbsp;</b></label>
        <input type="text"  name="password" placeholder="   Your password..">
        <?php if (isset($password) && count($errors['password']) > 0) { ?>
        <?php foreach ($errors['password'] as $k=>$v){ ?>
        <p style="color: red">   <?php echo $v; ?></p>
        <?php } ?>
        <?php } ?>
                   <input type="submit" value="Login">

    </form>
</div>

</body>
</html>
