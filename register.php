<?php
  session_start();
  require("connection.php");
  $errors=[
      'name'=>[],
      'password'=>[],
      'repassword'=>[],
        'passwordcheck'=>[],
      'email'=>[],
      'registeration'=>[]
  ];
   $name=null;
  if(isset($_POST['name'])){
      $name=$_POST['name'];
      if(strlen($name)<6){
          array_push($errors['name'],' &nbsp;&nbsp;Username must be 6 character at least');
      }
  }
  $password=null;
if(isset($_POST['password'])){
    $password=$_POST['password'];
    if(strlen($password)<6){
        array_push($errors['password'],'&nbsp;&nbsp; Password must be 6 character at least');
    }
}
$repassword=null;
if(isset($_POST['repassword'])){
    $repassword=$_POST['repassword'];
    if(strlen($repassword)<6){
        array_push($errors['repassword'],' &nbsp;&nbsp;RePassword must be 6 character at least');
    }
}
if (strcmp($password, $repassword) != 0){
    array_push($errors['passwordcheck'],'&nbsp;&nbsp;Password and Repassword not matched');

}
$mail=null;
if(isset($_POST['mail'])){
    $mail=$_POST['mail'];
    if(strlen($mail)<6){
        array_push($errors['email'],'&nbsp;&nbsp; Email must be 6 character at least');
    }
}
 $address=null;
if(isset($_POST['address'])){
    $address=$_POST['address'];
}
//var_dump($errors);
if(count($errors['name'])==0 &&  count($errors['password'])==0 && count($errors['repassword'])==0 && 
count($errors['passwordcheck'])==0 && count($errors['email'])==0){
$sql=" INSERT INTO users(username,password,mail,address) VALUES ('$name','$password','$mail','$address');";

$result=$conn->query($sql);
//var_dump($errors);
}
//// for more check only 
 $affectedRows = $conn->affected_rows;
        if ($affectedRows > 0) {
            // REGISTRATION SUCCESS!
             $link = $_SERVER['HTTP_HOST'];
            header('Location:http://localhost/LoginPage.php');
           
        } else {
            array_push($errors['registeration'], 'Registerarion Failed');   
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
</div>
<div style="padding: 6%; padding-left:300px;">
    <form action=""  method="post"  >
         <?php if (count($errors['name']) > 0 || count($errors['password'])>0 
         || count($errors['repassword'])>0 || count($errors['passwordcheck'])>0 
         || count($errors['email'])>0 ) { ?>

    <div style="width: 250px; height: 18px; background-color:red; margin-left: 20%; font-size: 20px "> <b  style="padding-left: 20% "> Registeration Failed </b>   </div>
         
           <?php } ?>
        <label for="fname" style="color: darkcyan"><b>your name</b></label>
        <input type="text" id="fname" name="name" placeholder="  Your username.."><br>
        <?php if(isset($errors) && count($errors['name'])>0){ ?>
            <?php foreach ($errors['name'] as $k=> $v){ ?>
           <p style="color:red"> <?php echo  $v; ?> </p>
       <?php } ?>
       <?php } ?>

        <label  style="color: darkcyan"><b>password &nbsp;</b></label>
        <input type="text"  name="password" placeholder="   Your password.."><br>
        <?php if(isset($errors) && count($errors['password'])>0){ ?>
            <?php foreach ($errors['password'] as $k=> $v){ ?>
                <p style="color:red"> <?php echo  $v; ?> </p>
            <?php } ?>
        <?php } ?>
        <label  style="color: darkcyan"><b> &nbsp; Repeat &nbsp; &nbsp;</b></label>
        <input type="text"  name="repassword" placeholder="  Repeat password.."><br>

        <?php if(isset($errors) && count($errors['repassword'])>0){ ?>
            <?php foreach ($errors['repassword'] as $k=> $v){ ?>
                <p style="color:red"> <?php echo  $v; ?> </p>
            <?php } ?>
        <?php } ?>

        <?php if(isset($errors) && count($errors['passwordcheck'])>0){ ?>
            <?php foreach ($errors['passwordcheck'] as $k=> $v){ ?>
                <p style="color:red"> <?php echo  $v; ?> </p>
            <?php } ?>
        <?php } ?>
        <label  style="color: darkcyan"><b> Your Mail</b></label>
        <input type="text"  name="mail" placeholder="  Your Mail@.."><br>
        <?php if(isset($errors) && count($errors['email'])>0){ ?>
            <?php foreach ($errors['email'] as $k=> $v){ ?>
                <p style="color:red"> <?php echo  $v; ?> </p>
            <?php } ?>
        <?php } ?>
        <label  style="color: darkcyan"><b>  Address &nbsp;&nbsp;</b></label>
        <input type="text"  name="address" placeholder="  Your Address.."><br>
        <input type="submit" value="Regist">

    </form>
</div>

</body>
</html>