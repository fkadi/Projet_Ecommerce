<form method="post" action="" enctype="multipart/form-data">
<table align="center" width="700">
				<tr align="center">
					<td colspan="5"><h2> Modifier le mot de passe</h2></td>
				</tr>

				<tr>
					<td align="right"><b>Mot de passe actuel:</b></td>
					<td><input type="password" name="current_pass" size="17" required/></td>
				</tr>

       	<tr>
					<td align="right"><b>Nouveau mot de passe:</b></td>
					<td><input type="password" name="new_pass" size="17" required/></td>
				</tr>
				<tr>
					<td align="right"><b>Saisissez une seconde fois le nouveau mot de passe:</b></td>
					<td><input type="password" name="new_pass_again" size="17" required/></td>
				</tr>

        <tr align="center">
					<td colspan="5"><input type="submit" name="change_pass" value="Modiffier" /></td>
				</tr>

</table>

</form>

<?php

include("includes/db.php");

  if(isset($_POST['change_pass'])){

    $user =$_SESSION['customer_email'];
    //echo $user;
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $new_again = $_POST['new_pass_again'];

    $sel_pass = "select * from customers where customer_pass='$current_pass' AND customer_email='$user'";

    $run_pass = mysqli_query($con, $sel_pass);
    $check_pass =mysqli_num_rows($run_pass);

    if($check_pass==0){

  		echo "<script>alert('Le mot de passe entré est incorrect!!')</script>";
      exit();
  	}

    if($new_pass!=$new_again){

        echo "<script>alert('Les mots de passe ne sont pas identiques!!')</script>";
        exit();
    }
    else {
      $update_pass = "update customers set customer_pass='$new_pass' where customer_email='$user'";
      $run_update = mysqli_query($con, $update_pass);
      echo "<script>alert('Votre mot de passe a été mis à jour avec succès!!')</script>";
      echo "<script>window.open('my_account.php','_self')</script>";
    }


  }

 ?>
