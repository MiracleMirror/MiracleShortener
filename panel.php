<head>

<title>Miracle Shortener panel</title>
<meta charset="UTF-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
.rainbow {
   /* Chrome, Safari, Opera */
  -webkit-animation: rainbow 1s infinite; 
  
  /* Internet Explorer */
  -ms-animation: rainbow 1s infinite;
  
  /* Standar Syntax */
  animation: rainbow 1s infinite; 
}

/* Chrome, Safari, Opera */
@-webkit-keyframes rainbow{
	20%{color: red;}
	40%{color: yellow;}
	60%{color: green;}
	80%{color: blue;}
	100%{color: orange;}	
}
/* Internet Explorer */
@-ms-keyframes rainbow{
	20%{color: red;}
	40%{color: yellow;}
	60%{color: green;}
	80%{color: blue;}
	100%{color: orange;}	
}

/* Standar Syntax */
@keyframes rainbow{
	20%{color: red;}
	40%{color: yellow;}
	60%{color: green;}
	80%{color: blue;}
	100%{color: orange;}	
}
</style>

</head>

<!--=

Developed by AlexB



$$$$$$$$\                  $$\                        $$$$$$\   $$$$$$\  
$$  _____|                 $$ |                      $$  __$$\ $$  __$$\ 
$$ |   $$\   $$\  $$$$$$$\ $$ |  $$\        $$$$$$\  $$ /  \__|$$ /  \__|
$$$$$\ $$ |  $$ |$$  _____|$$ | $$  |      $$  __$$\ $$$$\     $$$$\     
$$  __|$$ |  $$ |$$ /      $$$$$$  /       $$ /  $$ |$$  _|    $$  _|    
$$ |   $$ |  $$ |$$ |      $$  _$$<        $$ |  $$ |$$ |      $$ |      
$$ |   \$$$$$$  |\$$$$$$$\ $$ | \$$\       \$$$$$$  |$$ |      $$ |      
\__|    \______/  \_______|\__|  \__|       \______/ \__|      \__|      
                                                                         


=-->

<script>

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<body class="text-center">
<div class="container">
<?php 
if($_SESSION['role']=="user"){
?>
<h2 >Hola, <?php echo $_SESSION['u']; ?></h2>
<?php
}else{
	?>
	<h2 >Hola, <a class="rainbow"><?php echo $_SESSION['u']; ?> </a></h2>
	<?php 
}
	?>

<p >Уровень доступа - <b class=""><?php echo $_SESSION['role']; ?> </b></p>


  <?php 
  if($error){
  echo '<div class="alert alert-danger" role="alert">'.@$error.'</div>'; 
  }
  ?>

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Сокращенные URL
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
	  
       <form method="POST">
	   
	   <div class="input-group mb-3">
  <input type="text" required name="toURL" class="form-control" placeholder="Введите URL" aria-label="Введите URL" aria-describedby="basic-addon2">
  <?php 
if($_SESSION['role']!="user"){
?>
  <input type="text" name="shURL" class="form-control"  placeholder="Короткая ссылка">
  	<?php }	?>
  
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit">Сократить</button>
  </div>
  
 </form>
 
</div>
	   

<table class="table">
  <thead>
    <tr>
		<th scope="col">id</th>
      <th scope="col">Откуда</th>
      <th scope="col">Куда</th>
	  <th scope="col">Переходы</th>
	  <th scope="col">Кто добавил</th>
      <th scope="col">Действие</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if($_SESSION['role']=="admin"){
  $result = mysqli_query($db, "SELECT * FROM url");
  }else{
	  $result = mysqli_query($db, "SELECT * FROM url WHERE creator='".$_SESSION['u']."'");
  }
	//$result = mysqli_fetch_assoc($result);
	
	
	//print_r($result);
	foreach($result as $r){
		//print_r($r);
		echo"<tr>";
		echo"<td>".$r['id']."</td>";
		?>
		<td><a Data-toggle='tooltip' data-placement='top' title='<?php echo $site; ?>/<?php echo $r['afrom']; ?>'  target="_blank" href='<?php echo $site; ?>/<?php echo $r['afrom']; ?>'><?php echo $r['afrom']; ?></a></td>
		<?php
		echo"<td>".$r['ato']."</td>";
		?>
		<td><?php echo $r['clicks']; ?></td>
		<td><a data-toggle='tooltip' data-placement='top' title='ip: <?php echo $r['ip']; ?>'><?php echo $r['creator']; ?></a></td>
		
		<td><a href='api.php?action=deleteshort&<?php echo "id=".$r['id'];?>' onClick="return window.confirm('Точно удалить <?php echo $r['afrom'];?>?');">удалить</a></td>
		<?php
		echo"</tr>";
		
	}
  
  ?>
  
  </tbody>
</table>


	   </div>
    </div>
  </div>
  <?php
  if($_SESSION['role']=="admin"){
  ?>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Пользователи
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      
	         <form method="POST">
	   
	   <div class="input-group mb-3">
	     <div class="input-group-prepend">
 <select class="custom-select" name="AddRole" id="inputGroupSelect01">
    <option selected value="vip">Вип</option>
    <option value="admin">Админ</option>
  </select>
  </div>
  <input type="text"  name="AddLogin" class="form-control" placeholder="Логин"  aria-describedby="basic-addon2">
  <input type="text" name="AddPass" class="form-control"  placeholder="Пароль">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit">Добавить</button>
  </div>
  
 </form>
</div>
	  
	  
	  
	  <table class="table">
  <thead>
    <tr>
		<th scope="col">id</th>
      <th scope="col">Логин</th>
      <th scope="col">Роль</th>
      <th scope="col">Действие</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $result = mysqli_query($db, "SELECT * FROM users");
	
	
	
	//print_r($result);
	foreach($result as $r){
		//print_r($r);
		echo"<tr>";
		echo"<td>".$r['id']."</td>";
		echo"<td>".$r['username']."</td>";
		echo"<td>".$r['role']."</td>";
		?>
		
		<td><a href='api.php?action=deleteuser&<?php echo "id=".$r['id'];?>' onClick="return window.confirm('Точно удалить <?php echo $r['username'];?>?');">удалить</a></td>
		<?php
		echo"</tr>";
		
	}
  
  ?>
  
  </tbody>
</table>
	  
	  

	  </div>
    </div>
  </div>
  
  
    <div class="card">
    <div class="card-header" id="heading3">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
          ADMIN команды
        </button>
      </h5>
    </div>
    <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
      <div class="card-body">
	  
       <form method="POST">
	   
	   <div class="input-group mb-3">
  <input type="text" required name="adminC" class="form-control" placeholder="команда" aria-label="Введите URL" aria-describedby="basic-addon2">

  <input type="text" required name="adminType" class="form-control"  placeholder="тип">
  
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit">Выполнить</button>
  </div>
  
 </form>
 
</div>
	   




	   </div>
    </div>
  </div>
  <a href="https://github.com/MiracleMirror/MiracleShortener">Miracle Shortener</a> By <a href="https://miraclemirror.net">Miracle Mirror</a>
  
  
  <?php
  }
  ?>
</div>

<?php 
if($_SESSION['role']=="user"){
?>
<br><br>
<?php
}
?>



</div>

</body>