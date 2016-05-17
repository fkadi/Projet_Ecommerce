<?php
if(!isset($_SESSION['user_email'])){

  echo "<script>window.open('login.php?not_admin=Vous n\'êtes pas un admin !','_self')</script>";
}
else{
?>

<form action="" method="post" style="padding:80px;">

  <b>Inserer une nouvelle catégorie:</b>
  <input type="text" name="new_cat" />
  <input type="submit" name="add_cat" value="Ajouter"/>

</form>

<?php
include("includes/db.php");

if (isset($_POST['add_cat'])){

  $new_cat = $_POST['new_cat'];
  $insert_cat = "INSERT INTO categories (cat_title) values ('$new_cat')";
  $run_cat = Mysqli_query($con, $insert_cat);

  if ($run_cat){
  echo "<script>alert('la catégorie est bien ajouter')</script>";
  echo "<script>window.open('index.php?view_cats','_self')</script>";
  }

}

}
 ?>
