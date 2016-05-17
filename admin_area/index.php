<?php

session_start();

if(!isset($_SESSION['user_email'])){

  echo "<script>window.open('login.php?not_admin=Vous n\'êtes pas un admin !','_self')</script>";
}
else{
?>
<!DOCTYPE>
<html>
  <head>
    <title> compte Admin </title>
    <link rel="stylesheet" href="styles/style.css" media="all" />
  </head>

  <body>
    <div class="main_wrapper">

        <div id="header"></div>
        <div id="right">
          <h2 style="text-align:center;"> La gestion </h2>
            <a href="index.php?insert_product">Ajouter un produit</a>
            <a href="index.php?view_products"> Produits disponibles</a>
            <a href="index.php?insert_cat"> Ajouter une catégorie</a>
            <a href="index.php?view_cats"> Catégories diponibles</a>
            <a href="index.php?insert_brand"> Ajouter une marque</a>
            <a href="index.php?view_brands"> Marques disponibles</a>
            <a href="index.php?view_customers">nouveaux clients</a>
            <a href="index.php?view_orders"> nouvelles commandes</a>
            <a href="index.php?view_payments">nouveau paiement </a>
            <a href="logout.php"> Déconnecter</a>




        </div>
        <div id="left">
        <h2 style="color:red; text-align:center;"><? echo @$_GET['logged_in']; ?></h2>
          <?php
            if(isset($_GET['insert_product'])){
              include("insert_product.php");
            }
            if(isset($_GET['view_products'])){
              include("view_products.php");
            }
            if(isset($_GET['edit_pro'])){
              include("edit_pro.php");
            }
            if(isset($_GET['insert_cat'])){
              include("insert_cat.php");
            }
            if(isset($_GET['view_cats'])){
              include("view_cats.php");
            }
            if(isset($_GET['edit_cat'])){
              include("edit_cat.php");
            }
            if(isset($_GET['insert_brand'])){
              include("insert_brand.php");
            }
            if(isset($_GET['view_brands'])){
              include("view_brands.php");
            }
            if(isset($_GET['edit_brand'])){
              include("edit_brand.php");
            }
            if(isset($_GET['view_customers'])){
              include("view_customers.php");
            }
           ?>

        </div>


   </div>
  </body>

</html>

<?php } ?>
