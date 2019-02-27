<?php
include_once('connection.php');
//session_start();
$errors=[
   'msgError'=>[]
];
$message=null;
$userlink="http://localhost/SendMessage.php?to=rana maged";
//var_dump($userlink);
if(isset($_POST['message'])){
	$message=$_POST['message'];
	//var_dump($message);
	if(strlen($message)<2){
		array_push($errors['msgError'], " Message Very Short");
	}
}
$tousername=null;
if (isset($_GET['to'])) {
$tousername=$_REQUEST['to'];
	//var_dump($tousername);
}

if( $message && count($errors['msgError'])== 0){
	// $sql= "INSERT INTO messages (to_users_id, content) VALUES 
 //          ((SELECT id FROM users WHERE username = '$tousername'), '$message');";
$sql="INSERT INTO messages (to_users_id ,content) VALUES ((SELECT id FROM users WHERE username = '$tousername'),
                             '$message');";   
       $result=$conn->query($sql);
         // var_dump($result);
}

//var_dump($errors);
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
        margin-left: 27%;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=submit]:hover {
        background-color: darksalmon;
    } 


</style>
<body style="background-color:#f2f2f2">
	      	<h2 style="color: darkcyan ;  margin-top: 1%;margin-left:7%; font-size: 60px; font-style: italic;">Welcome Saraha </h2>

	<form method="POST" action="<?php echo $userlink; ?>" >
		<h2 style="color: #000 ;  margin-top: 10%;margin-left:40%; font-size: 20px; font-style: italic;"> Send Message </h2>
<textarea name="message" style="width: 400px; height: 250px; background-color: white; margin-left: 30%; "> </textarea>
<br>
  <?php if(isset($errors) && count($errors['msgError'])>0){ ?>
            <?php foreach ($errors['msgError'] as $k=> $v){ ?>
                <p style="color:red; padding-left: 30%"> <?php echo  $v; ?> </p>
            <?php } ?>
        <?php } ?>
  <input type="submit" value="Send">
	</form>
	</body>
	</html>

