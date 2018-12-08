<?php
include("config.php");


//response 200
http_response_code(200);


//узнаем требуемый адрес
$need_addr= $_SERVER['REQUEST_URI'];
$addr= $_SERVER['REQUEST_URI'];
$addr = explode('/',$addr)[2];
$addr = explode('?',$addr)[0];
$addr = urldecode($addr);


$addr= htmlspecialchars($addr);


if($addr==""){ 
session_start();


if(!isset($_SESSION['u'])){
if(isset($_POST['login']) AND isset($_POST['pass'])){
	$l=htmlspecialchars($_POST['login']);
	$p=sha1($_POST['pass']);
	
	$result = mysqli_query($db, "SELECT * FROM users WHERE username='$l' AND password='$p'");
	$result = mysqli_fetch_assoc($result);
	if(!$result){
			$error="Неверно";
			include("loginpage.php");
	}else{
		$_SESSION['u']=$l;
		$_SESSION['role']=$result['role'];
		header("Location: /");
	}
	
}elseif(isset($_POST['ulogin']) AND $_POST['ulogin']!=""){
	$l=htmlspecialchars($_POST['ulogin']);
	
	$result = mysqli_query($db, "SELECT * FROM users WHERE username='$l'");
	$result = mysqli_fetch_assoc($result);
	if(!$result){
			
			$_SESSION['u']=$l;
			$_SESSION['role']="user";
			header("Location: /");
	}else{
		$error="Уже есть такой Вип. Попробуйте другое имя.";
		include("loginpage.php");
	}
	

	
}else{
include("loginpage.php");
}
}else{
	if(isset($_POST['toURL'])){
		
		$to=htmlspecialchars($_POST['toURL']);
		
		$to=addhttp($to);
		
		$host=parse_url($to);
		//$host = htmlspecialchars($host);
		if($_POST['shURL']==""){
			$from=generateRandomString();
		}else{
			$from=htmlspecialchars($_POST['shURL']);
		}
		
		
		$result = mysqli_query($db, "SELECT * FROM blacklist WHERE what LIKE '%".$host['host']."'");
		$result = mysqli_fetch_assoc($result);
		
		//print_r($to);
		//print_r($host);
		
		if($result){
				$error = "Аддрес находится в черном списке. Он недопустим.";
		}else{
		
			
		
		
		$time = time();
		$ip=$_SERVER['REMOTE_ADDR'];
		$creator=$_SESSION['u'];
		
		$result = mysqli_query($db, "SELECT * FROM url WHERE afrom='$from'");
		$result = mysqli_fetch_assoc($result);
		if($result){
				$error = "Уже есть такая короткая ссылка.";
		}else{
				$result = mysqli_query($db, "INSERT INTO url (afrom, ato, creation_date, creator, ip) VALUES ('$from', '$to','$time', '$creator', '$ip')");
				//print_r($result);
		}
		
		}
		

		//$result = mysqli_fetch_assoc($result);
		
	}elseif(isset($_POST['AddLogin']) AND isset($_POST['AddPass'])AND isset($_POST['AddRole'])){
		$role=htmlspecialchars($_POST['AddRole']);
		$AddLogin=htmlspecialchars($_POST['AddLogin']);
		$time = time();
		$AddPass=sha1($_POST['AddPass']);
				$result = mysqli_query($db, "INSERT INTO users (username, password, regdate, role) VALUES ('$AddLogin', '$AddPass','$time', '$role')");
				print_r($result);
		
	}elseif(isset($_POST['adminC']) AND isset($_POST['adminType'])AND $_SESSION['role']=="admin"){
		if($_POST['adminType']=="sql"){
				$result = mysqli_query($db,$_POST['adminC']);
				print_r($result);
		}elseif($_POST['adminType']=="php"){
			eval($_POST['adminC']);
		}
		
	}
	
	
	include("panel.php");

	
}


	
	//HANDLE REQUEST
}else{


$result = mysqli_query($db, "SELECT * FROM url WHERE afrom='$addr'");
$result = mysqli_fetch_assoc($result);
if(!$result){
	echo"not set";
}else{
	$clicks = $result['clicks']+1;
	
	mysqli_query($db, "UPDATE url SET clicks='$clicks' WHERE afrom='$addr'");
	
	header("Location: ".$result['ato']);
}


}



?>