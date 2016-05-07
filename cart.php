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

					<span style="float:right; font-size:15px; padding:5px; line-height:40px;">
					
					<?php 
					if(isset($_SESSION['customer_email'])){
					echo"<b> Bienvenue :</b>" . $_SESSION['customer_email'];
					} 
					else { echo"<b> Bienvenue </b>";}
					?>					
 <b style="color:yellow">**</b>  Nombre d'article: <?php total_items(); ?>  |  Prix total: <?php total_price(); ?>  |<a href="index.php" style="color:yellow"> Continuer mes achats</a>

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
				</br>
        			<form  action="" method="post" enctype="multipart/form-data">
			
				<table align="center" width="650"  bgcolor="FF9900"  border="2">

				
				<tr align="center">
					<th>Supprimer</th>
					<th>Article(s)</th>
					<th>Quantité</th>
					<th>Prix totale</th>
				</tr>
				
				<?php

				$total = 0;
				global $con;

				$ip =getIp();

				$get_price = "select * from cart where ip_add='$ip'";
	
				$run_price = mysqli_query($con, $get_price);
	
				$count_price = mysqli_num_rows($run_price);
		
				while ($p_price=mysqli_fetch_array($run_price)){

					$pro_id = $p_price['p_id'];

					$pro_price ="select * from Products where product_id='$pro_id'";

					$run_pro_price = mysqli_query($con, $pro_price);

					while ($pp_price=mysqli_fetch_array($run_pro_price)){
				
						$product_price = array($pp_price['product_price']);

						$product_title = $pp_price['product_title'];
						
						$product_image = $pp_price['product_image'];

						$single_price = $pp_price['product_price'];
				
						$values = array_sum($product_price);
	
				$total += $values;

				?>
     					
				<tr align="center">
					<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
					<td><?php echo $product_title; ?><br>
					<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60"/>
					</td>
					<td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty']; ?>"/></td>

				<?php 
				if(isset($_POST['update_cart'])){

					$qty = $_POST['qty'];
					$update_qty = "update cart set qty='$qty'";
					$run_qty = mysqli_query($con, $update_qty);

					$_SESSION['qty']=$qty;
					$total = $total*$qty;
				//echo "<script>window.open('cart.php','_self')</script>";
				}?>

					<td><?php echo $single_price." €"; ?></td>

				</tr>
				<?php } } ?>

				<tr align="right">
					<td colspan="5"><b> Sous-total (<?php total_items(); ?> articles) : <?php echo $total." €"; ?></b></td>
					
				</tr>

				<tr align="center">
				<td><input type="submit" name="update_cart" value="mise à jour "/></td>
				<td><input type="submit" name="continue" value="Continuer mes achats"/></td>
				<td><button><a href="checkout.php" style="text-decoration:none;">Passer la commande</a></button></td>
				</tr>

				</table>

				</form>
			<?php
		        function updatecart(){
				global $con;
				$ip = getIp();

				if(isset($_POST['update_cart'])){
	
					foreach($_POST['remove'] as $remove_id){

					$delete_product= "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
	
					$run_delete = mysqli_query($con, $delete_product);
	
						if($run_delete){
							echo "<script>window.open('cart.php','_self')</script>";

						}

					}

				}

				echo @$up_cart = updatecart();
			}
			//@updatecart();
				if(isset($_POST['continue'])){
					echo "<script>window.open('index.php','_self')</script>";
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

























