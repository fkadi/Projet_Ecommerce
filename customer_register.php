<!DOCTYPE>
<?php 
session_start();
include("functions/Functions.php");
include("includes/db.php");

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
				</br></br>
<form method="post" action="customer_register.php" enctype="multipart/form-data">
<table align="center" width="700">

				<tr align="center">
					<td colspan="8"><h2>Vous êtes nouveau client ?</h2></td>
				</tr>

				<tr>
					<td align="right"><b>Nom :</b></td>
					<td><input type="text" name="c_name" size="50" /></td>
				</tr>
				<tr>
					<td align="right"><b>Prènom :</b></td>
					<td><input type="text" name="c_first_name" size="50" /></td>
				</tr>
       				 <tr>
					<td align="right"><b>Email:</b></td>
					<td><input type="text" name="c_email" size="50" /></td>
				</tr>
				<tr>
					<td align="right"><b>Mot de passe:</b></td>
					<td><input type="password" name="c_pass" size="50" /></td>
				</tr>
				<tr>
					<td align="right"><b>Adresse:</b></td>
					<td><textarea cols="50" rows="4" name="c_address"/></textarea></td>
				</tr>
				<tr>
					<td align="right"><b>Ville:</b></td>
					<td><input type="text" name="c_city" size="50" /></td>
				</tr>
				<tr>
					<td align="right"><b>Pays:</b></td>
					<td>   <select name="c_country">
							<option>Allemagne</option>
							<option>Belgique</option>
							<option>Danemark</option>
							<option>Espagne</option>
							<option>France</option>
							<option>Luxembourg</option>
							<option>Royaume-Uni</option>
						</select>

					</td>
				</tr>
                              
				<tr>
					<td align="right"><b>Mobile:</b></td>
					<td><input type="text" name="c_contact" size="50" required/></td>
				</tr>
				<tr>
					<td align="right"><b>Photo:</b></td>
					<td><input type="file" name="c_image" /></td>
				</tr>
				<tr align="center">
	
					<td colspan="8"><input type="submit" name="register" value="Créer un compte" /></td>
				</tr>
</table>

</form>
				</div>

			</div>
		</div>
		

		<div id="footer">
			<p>&copy; 2016 www.FatKadi.com<p>		
		</div>
 
	</div>

</body>
</html>

<?php
	if(isset($_POST['register'])){
	global $con;
	$ip =getIp();

	$c_name =$_POST['c_name'];
	$c_first_name =$_POST['c_first_name'];
	$c_email =$_POST['c_email'];
	$c_pass =$_POST['c_pass'];
	$c_address =$_POST['c_address'];
	$c_city =$_POST['c_city'];
	$c_country =$_POST['c_country'];
	$c_contact =$_POST['c_contact'];

	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];

	move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

	$insert_c = "INSERT INTO customers (customer_ip, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_image, customer_address, customer_first_name, customer_contact ) VALUES('$ip', '$c_name', '$c_email', '$c_pass', '$c_country', '$c_city', '$c_image', '$c_address', '$c_first_name', '$c_contact')";

	$run_c = mysqli_query($con, $insert_c);

			$sel_cart ="select * from cart where ip_add='$ip'";
			$run_cart = mysqli_query($con, $sel_cart);
			$check_cart = mysqli_num_rows($run_cart);

			if($check_cart==0){
				
				$_SESSION['customer_email']=$c_email;

				echo "<script>alert('Le compte a été créé avec succès, Merci!!')</script>";
			        echo "<script>window.open('customer/my_account.php','_self')</script>";
			
			}

			else {
				$_SESSION['customer_email']=$c_email;

				echo "<script>alert('Le compte a été créé avec succès, Merci!!')</script>";
			        echo "<script>window.open('checkout.php','_self')</script>";


			}
}


?>

























