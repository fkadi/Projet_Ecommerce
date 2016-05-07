<!DOCTYPE>
<?php 
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
				<div id="shopping_cart">

					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					Bienvenue ! <b style="color:yellow">***</b> Prix total:<a href="cart.php" style="color:yellow">  votre panier</a>

					</span>
				</div>

				<div id="products_box">
				
				<?php 
                                 if (isset($_GET['search'])){

					$search_query = $_GET['user_query'];
					$get_pro = "select * from Products where product_title like '%$search_query%'";
								$run_pro = mysqli_query($con, $get_pro);
								$count_pros = mysqli_num_rows($run_pro);

		if ($count_pros==0){
			echo"<h2 style='padding:20px;'> Votre recherche << $search_query >> ne correspond à aucun article.</h2>
			<h3>** Utiliser des termes plus généraux </h3>
                        <h3>**  Vérifier l'orthographe</h3>";
		}

								while($row_pro=mysqli_fetch_array($run_pro)){

									$pro_id = $row_pro['product_id'];
									$pro_cat = $row_pro['product_cat'];
									$pro_brand = $row_pro['product_brand'];
									$pro_title = $row_pro['product_title'];
									$pro_price = $row_pro['product_price'];
									$pro_image = $row_pro['product_image'];

									echo " 
										<div id='single_product'>

											<h3>$pro_title</h3>
											<img src='admin_area/product_images/$pro_image' whdth='180' height=180' />
											<p><b> Prix: EUR $pro_price </b></p>
				
											<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>

											<a href='index.php?pro_id=$pro_id'><button style='float:right'>Ajouter au panier</button></a>
										</div>
		
									";
								}


				
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

























