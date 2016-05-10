<!DOCTYPE>
<?php
include("includes/db.php");

?>
<html>

	<head>
		<title>Inserer un produit</title>
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
 		<script>tinymce.init({ selector:'textarea' });</script>
	</head>

	<body>
		<form  action="" method="post" enctype="multipart/form-data">

			<table align="center" width="795" bgcolor="FF9900" >

				<tr align="center">
					<td colspan="7"><h2>Inserer un nouveau produit</h2></td>
				</tr>

				<tr>
					<td align="right"><b>Nom de produit:</b></td>
					<td><input type="text" name="product_title" size="50" /></td>
				</tr>
				<tr>
					<td align="right"><b>Catégorie de produit:</b></td>
					<td>
						<select name="product_cat">
							<option> Selectionner une catégorie</option>
						        <?php

								$get_cats = "select * from categories";
								$run_cats = mysqli_query($con, $get_cats);
								while ($row_cats=mysqli_fetch_array($run_cats)){

									$cat_id = $row_cats['cat_id'];
									$cat_title = $row_cats['cat_title'];

								echo "<option value='$cat_id'>$cat_title</option>";
								}
    							?>
					</td>
				</tr>
				<tr>
					<td align="right"><b>Marque de produit:</b></td>
					<td>
						<select name="product_brand">
							<option> Selectionner une marque</option>
						        <?php

								$get_brands = "select * from brands";
								$run_brands = mysqli_query($con, $get_brands);
								while ($row_brands=mysqli_fetch_array($run_brands)){

									$brand_id = $row_brands['brand_id'];
									$brand_title = $row_brands['brand_title'];

								echo "<option value='$brand_id'>$brand_title</option>";
								}
							?>

					</td>
				</tr>
				<tr>
					<td align="right"><b>Image de produit:</b></td>
					<td><input type="file" name="product_image" /></td>
				</tr>
				<tr>
					<td align="right"><b>Prix de produit:</b></td>
					<td><input type="text" name="product_price" /></td>
				</tr>
				<tr>
					<td align="right"><b>Description de produit:</b></td>
					<td><textarea name="product_desc" cols="50" rows="17" ></textarea></td>
				</tr>
				<tr>
					<td align="right"><b>Référence de produit:</b></td>
					<td><input type="text" name="product_keywords" size="50" /></td>
				</tr>
				<tr align="center">

					<td colspan="7"><input type="submit" name="insert" value="Ajouter" /></td>
				</tr>

                        </table>
		</form>


	</body>



</html>


<?php


//insertion des données dans la bd

	if(isset($_POST['insert'])){

			$product_title = $_POST['product_title'];
			$product_cat = $_POST['product_cat'];
			$product_brand = $_POST['product_brand'];
			$product_price = $_POST['product_price'];
			$product_desc = $_POST['product_desc'];
			$product_keywords = $_POST['product_keywords'];

			//inserer l'image dans la bd
			$product_image = $_FILES['product_image']['name'];
   		        $product_image_tmp = $_FILES['product_image']['tmp_name'];

			move_uploaded_file($product_image_tmp,"product_images/$product_image");


	 $insert_product = "INSERT INTO Products (product_cat, product_title, product_brand, product_price, product_desc, product_keywords, product_image) VALUES('$product_cat', '$product_title', '$product_brand', '$product_price', '$product_desc', '$product_keywords', '$product_image')";

		$insert_pro = mysqli_query($con, $insert_product);

			if ($insert_pro){
			echo "<script>alert('le produit est bien ajouter')</script>";
			echo "<script>window.open('index.php?insert_product','_self)</script>";
			}


	}



?>
