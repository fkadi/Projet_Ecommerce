<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Compte Admin </title>

        <link rel="stylesheet" href="styles/style_login.css" media="all" />


  </head>

  <body>

    <div class="login">

      <h2 style="color:orange; text-align:center;" ><?php echo @$_GET['not_admin']; ?></h2>
      <h2 style="color:orange; text-align:center;" ><?php echo @$_GET['logged_out']; ?></h2>

	<h1>S'identifier</h1>
    <form method="post">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="password" placeholder="Mot de passe" required="required" />
        <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Entrer</button>
    </form>
</div>




  </body>
</html>

<?php
session_start();

include("includes/db.php");

  if(isset($_POST['login'])){
    $email = mysql_real_escape_string($_POST['email']);
    $pass = mysql_real_escape_string($_POST['password']);

    $sel_user = "SELECT * from admins where user_email='$email' and user_pass='$pass'";
    $run_user = mysqli_query($con, $sel_user);

    $check_user = mysqli_num_rows($run_user);

    if($check_user==0){
      echo "<script>alert('Authentification erronée!')</script>";
    }
    else {
      $_SESSION['user_email']=$email;
      echo "<script>window.open('index.php?logged_in= bienvenue admin !','_self')</script>";
    }

  }


 ?>
