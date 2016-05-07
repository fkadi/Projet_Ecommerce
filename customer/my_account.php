<!DOCTYPE>
<?php
session_start();
include("functions/Functions.php");

?>


<html>
	<head>
		<title> Ma boutique en ligne </title>
		<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>
<body>

	<div class="main_wrapper">

        	<div class="header_wrapper">
			<img id="logo" src="images/tel.jpg"/>
			<img src="images/images.jpg"/>
			<img id="banner" src="images/lap.jpg"/>
                </div>

		<div class="menubar">

			<ul id="menu">
				<li><a href="./index.php">Accueil</a><li/>
				<li><a href="./all_products.php">Produits</a><li/>
				<li><a href="./customer/my_account.php">Votre compte</a><li/>
				<li><a href="#">S'inscrire</a><li/>
				<li><a href="./cart.php">Panier</a><li/>
				<li><a href="#">Contact</a><li/>

			</ul>
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder=" Rechercher un produit"/>
					<input type="submit" name="search" value="recherche" />
				</form>
			</div>

                </div>




		<div class="content_wrapper">

			<div id="sidebar">

				<div id="sidebar_title">Votre compte</div>

				    <ul id="cats">

                  <?php

                      $user= $_SESSION['customer_email'];
                      $get_img = "select * from customers where customer_email='$user'";
                      $run_img = mysqli_query($con, $get_img);
                      $row_img = mysqli_fetch_array($run_img);
                      $c_image = $row_img['customer_image'];
                      $c_name = $row_img['customer_name'];
                      $c_first_name = $row_img['customer_first_name'];

                      echo "<img src='customer_images/$c_image' width='100px' height='100px'/>";

                   ?>
					         <li><a href="my_account.php?my_orders">Vos commandes</a></li>
                   <li><a href="my_account.php?edit_account">Mise à jour de compte</a></li>
                   <li><a href="my_account.php?change_pass">Modifier mot de passe</a></li>
                   <li><a href="my_account.php?delete_account">Supprimer le compte</a></li>

			      </ul>

			</div>

			<div id="content_area">

			 	<?php cart(); ?>

				<div id="shopping_cart">

					<span style="float:right; font-size:15px; padding:5px; line-height:40px;">

					<?php
					if(isset($_SESSION['customer_email'])){
					echo"<b> Bienvenue :</b>" . $_SESSION['customer_email'];
					}
					?>

		<?php

		if(!isset($_SESSION['customer_email'])){
			echo"<a href='checkout.php' style='color:orange;'>Connecter</a>";
			}
		else {
			echo"<a href='logout.php' style='color:orange;'>Déconnecter</a>";
			}


		?>
					</span>
				</div>

				<div id="products_box">


            <?php
            if(!isset($_GET['my_orders'])){
              if(!isset($_GET['edit_account'])){
                if(!isset($_GET['change_pass'])){
                  if(!isset($_GET['delete_account'])){
                      echo "<h2 style='padding:20px; color: red;'> Bienvenue:$c_name $c_first_name</h2>";
                      echo "<b>vous pouvez voir votre panier en cliquant sur ce <a href='my_account.php?my_orders'>lien</a></b>";
                  }
                }
              }
            }
            ?>
            <?php
              if(isset($_GET['edit_account'])){
                include("edit_account.php");
              }

              if(isset($_GET['change_pass'])){
                include("change_pass.php");
              }


             ?>
        </div>

			</div>
		</div>


		<div id="footer">
			<p>&copy; 2016 www.FatKadi.com<p>
		</div>

	</div>

</body>
