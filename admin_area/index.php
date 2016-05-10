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
            <a href="index.php?logout.php"> Déconnecter</a>




        </div>
        <div id="left">

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
           ?>

        </div>


   </div>
  </body>











</html>
