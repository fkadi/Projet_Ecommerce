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
				<li><a href="index.php">Accueil</a><li/>
				<li><a href="all_products.php">Produits</a><li/>
				<li><a href="customer/my_account.php">Votre compte</a><li/>
				<li><a href="#">S'inscrire</a><li/>
				<li><a href="cart.php">Panier</a><li/>
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

				<div id="sidebar_title">Catégories</div>

				<ul id="cats">
					<?php getCats(); ?>

			        </ul>
				
				<div id="sidebar_title">Marques</div>
				<ul id="cats">
					<?php getBrands(); ?>
			        </ul>
			</div>

			<div id="content_area">
			
			 	<?php cart(); ?>			

				<div id="shopping_cart">

					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					Bienvenue ! <b style="color:yellow"> :) **</b>  Nombre d'article: <?php total_items(); ?>  |  Prix total: <?php total_price(); ?>  |<a href="cart.php" style="color:yellow">  Votre panier</a>

					</span>
				</div>
				
				<div id="products_box">
				

		<?php
		if(!isset($_SESSION['customer_email'])){
			include("customer_login.php");
			}
		else {
			include("payment.php");
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

























