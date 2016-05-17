<?php
if(!isset($_SESSION['user_email'])){

  echo "<script>window.open('login.php?not_admin=Vous n\'êtes pas un admin !','_self')</script>";
}
else{
?>

<table align="center" width="795" bgcolor="FF9900" >

    <tr align="center">
      <td colspan="6"><h2> Tous les catégories disponibles</h2></td>
    </tr>

    <tr align="center" boder="2" bgcolor="skyblue">
      <th>id catégorie</th>
      <th>Nom de catégorie</th>
      <th>Modifier</th>
      <th>Supprimer</th>
    </tr>

    <?php
      include("includes/db.php");

      $get_cat = "select * from categories";
      $run_cat = mysqli_query($con, $get_cat);
      $i = 0;

      while ($row_cat=mysqli_fetch_array($run_cat)){

          $cat_id = $row_cat['cat_id'];
          $cat_title = $row_cat['cat_title'];

          $i++;

     ?>

      <tr align="center">
        <td><?php echo $i; ?></td>
        <td><?php echo $cat_title;?></td>
        <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Modifier</a></td>
        <td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Supprimer</a></td>

      </tr>
    <?php } ?>

</table>
<?php } ?>
