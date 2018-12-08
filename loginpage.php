<head>

<title>Miracle Shortener</title>
<meta charset="UTF-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body class="text-center">
<div class="container">
  <div class="card text-center" style="width: auto;">
  
  <div class="card-body">
    <h3 class="card-title">Вход для пользователей</h3>

	
  <?php 
  if($error){
  echo '<div class="alert alert-danger" role="alert">'.@$error.'</div>'; 
  }
  ?>

	
    <form method="POST">
  <div class="form-group">
    <input type="text" class="form-control" name="ulogin" placeholder="логин">
  </div>
  <button type="submit" class="btn btn-primary">Войти</button>
</form>

   
  </div>
</div>


<!-- Button trigger modal -->
<p>Если вы вип, нажмите кнопку:</p>
<button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
  Вход для Випов
</button>

<hr>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Вход</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
  <div class="card-body">
    <h3 class="card-title">Войдите</h3>

	
  <?php 
  if($error){
  echo '<div class="alert alert-danger" role="alert">'.@$error.'</div>'; 
  }
  ?>

	
    <form method="POST">
  <div class="form-group">
    <input type="text" class="form-control" name="login" placeholder="логин">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="pass" placeholder="пароль">
  </div>
  <button type="submit" class="btn btn-primary">Войти</button>
</form>

   
  </div>
</div>
      </div>

    </div>
  </div>
</div>


</body>