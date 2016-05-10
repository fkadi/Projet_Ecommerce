<?php
  include("includes/db.php");
  if (isset($_GET['delete_pro'])){
      $delete_id = $_GET['delete_pro'];
      $delete_pro = "delete from Products where product_id='$delete_id'";
      $run_delete = mysqli_query($con, $delete_pro);
      if($run_delete){

      		echo "<script>alert('le produit à bien été supprimer!')</script>";
          echo "<script>window.open('index.php?view_products','_self')</script>";
      }

}


?>
