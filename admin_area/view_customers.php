<?php
if(!isset($_SESSION['user_email'])){

  echo "<script>window.open('login.php?not_admin=Vous n\'êtes pas un admin !','_self')</script>";
}
else{
?>


<table align="center" width="795" bgcolor="FF9900" >

    <tr align="center">
      <td colspan="6"><h2> Tous les clients</h2></td>
    </tr>

    <tr align="center" boder="2" bgcolor="skyblue">
      <th>id client</th>
      <th>Nom</th>
      <th>Prènom</th>
      <th>Email</th>
      <th>Supprimer</th>
    </tr>

    <?php
      include("includes/db.php");

      $get_c = "select * from customers";
      $run_c = mysqli_query($con, $get_c);
      $i = 0;
      while ($row_c=mysqli_fetch_array($run_c)) {
          $c_id = $row_c['customer_id'];
          $c_name = $row_c['customer_name'];
          $c_first_name = $row_c['customer_first_name'];
          $c_email = $row_c['customer_email'];
          $i++;

     ?>

      <tr align="center">
        <td><?php echo $i; ?></td>
        <td><?php echo $c_name;?></td>
        <td><?php echo $c_first_name;?></td>
        <td><?php echo $c_email;?></td>
        <td><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Supprimer</a></td>

      </tr>
    <?php } ?>

</table>
<?php } ?>
