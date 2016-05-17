<?php
if(!isset($_SESSION['user_email'])){

  echo "<script>window.open('login.php?not_admin=Vous n\'êtes pas un admin !','_self')</script>";
}
else{
?>

<form action="" method="post" style="padding:80px;">

  <b>Inserer une nouvelle marque:</b>
  <input type="text" name="new_brand" />
  <input type="submit" name="add_brand" value="Ajouter"/>

</form>

<?php
include("includes/db.php");

if (isset($_POST['add_brand'])){

  $new_brand = $_POST['new_brand'];
  $insert_brand = "INSERT INTO brands (brand_title) values ('$new_brand')";
  $run_brand = Mysqli_query($con, $insert_brand);

  if ($run_brand){
  echo "<script>alert('la marque est bien ajouter')</script>";
  echo "<script>window.open('index.php?view_brands','_self')</script>";
  }

}

}
 ?>
