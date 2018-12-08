<?php
session_start();

include("config.php");
	//print_r($_GET);
	
	$act=$_GET['action'];
	$id = htmlspecialchars($_GET['id']);
	
	if($act=="deleteshort" AND isset($_GET['id']) AND isset($_SESSION['role'])){
		if($_SESSION['role']=="admin"){
			$result = mysqli_query($db, "DELETE FROM url WHERE id='$id'");
			header("Location: /");
		}else{
			
				$result = mysqli_query($db, "SELECT * FROM url WHERE id='$id' AND creator='".$_SESSION['u']."'");
				$result = mysqli_fetch_assoc($result);
				if(!$result){
					echo"Chto-to ne tak";
				}else{
					$result = mysqli_query($db, "DELETE FROM url WHERE id='$id'");
					header("Location: /");
		}
			
			
			//echo "chto-to ne tak";
		}
		
		
		
	//echo $_GET['id'];
	
	}elseif($act=="deleteuser" AND isset($_GET['id']) AND $_SESSION['role']=="admin"){
		
		$result = mysqli_query($db, "DELETE FROM users WHERE id='$id'");
			header("Location: /");
		
	
	}else{
		
		echo"invalid request.";
		
	}
?>