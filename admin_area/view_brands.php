<?php
if(!isset($_SESSION['user_email'])){

  echo "<script>window.open('login.php?not_admin=Vous n\'êtes pas un admin !','_self')</script>";
}
else{
?>

<table align="center" width="795" bgcolor="FF9900" >

    <tr align="center">
      <td colspan="6"><h2> Tous les marques disponibles</h2></td>
    </tr>

    <tr align="center" boder="2" bgcolor="skyblue">
      <th>id marque</th>
      <th>Nom de marque</th>
      <th>Modifier</th>
      <th>Supprimer</th>
    </tr>

    <?php
      include("includes/db.php");

      $get_brand = "select * from brands";
      $run_brand = mysqli_query($con, $get_brand);
      $i = 0;

      while ($row_brand=mysqli_fetch_array($run_brand)){

          $brand_id = $row_brand['brand_id'];
          $brand_title = $row_brand['brand_title'];

          $i++;

     ?>

      <tr align="center">
        <td><?php echo $i; ?></td>
        <td><?php echo $brand_title;?></td>
        <td><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Modifier</a></td>
        <td><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">Supprimer</a></td>

      </tr>
    <?php } ?>

</table>
<?php } ?>
