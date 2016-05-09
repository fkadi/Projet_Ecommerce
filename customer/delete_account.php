</br>

<h2 style="text-align: center; color: blue;"> Voulez-vous vraiment supprimer votre compte?</h2>
</br>
<p>Une fois votre compte supprimé, vous allez être redirigé vers la page d'accueil.</p>
<form action="" method="post">

</br>
<input type="submit" name="yes" value="Oui je veux" />
<input type="submit" name="no" value="Non je ne veux pas" />

</form>


<?php

include("includes/db.php");

  $user =$_SESSION['customer_email'];

  if(isset($_POST['yes'])){

    $delete_customer = "detete from customers where customer_email='$user'";

    $run_customer = mysqli_query($con, $delete_customer);

      session_destroy();
  		echo "<script>alert('votre compte à bien été supprimer!')</script>";
      echo "<script>window.open('../index.php','_self')</script>";
  }

  if(isset($_POST['no'])){


      echo "<script>alert('Merci pour votre confiance!')</script>";
      echo "<script>window.open('my_account.php','_self')</script>";
  }

 ?>
