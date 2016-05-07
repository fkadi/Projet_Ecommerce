<?php

		include("includes/db.php");
		$user = $_SESSION['customer_email'];

		$get_customer = "select * from customers where customer_email='$user'";
		$run_customer = mysqli_query($con, $get_customer);
		$row_customer = mysqli_fetch_array($run_customer);

		$c_id = $row_customer['customer_id'];
		$name = $row_customer['customer_name'];
		$first_name = $row_customer['customer_first_name'];
		$pass = $row_customer['customer_pass'];
		$email = $row_customer['customer_email'];
		$country = $row_customer['customer_country'];
		$city = $row_customer['customer_city'];
		$contact = $row_customer['customer_contact'];
		$address = $row_customer['customer_address'];
		$image = $row_customer['customer_image'];
?>


<form method="post" action="" enctype="multipart/form-data">
<table align="center" width="700">

				<tr align="center">
					<td colspan="8"><h2> Modifier votre comtpe</h2></td>
				</tr>

				<tr>
					<td align="right"><b>Nom :</b></td>
					<td><input type="text" name="c_name" size="50" value="<?php echo $name;?>" disabled/></td>
				</tr>
				<tr>
					<td align="right"><b>Prènom :</b></td>
					<td><input type="text" name="c_first_name" size="50" value="<?php echo $first_name;?>" disabled/></td>
				</tr>
       				 <tr>
					<td align="right"><b>Email:</b></td>
					<td><input type="text" name="c_email" size="50" value="<?php echo $email;?>"disabled/></td>
				</tr>
				<tr>
					<td align="right"><b>Mot de passe:</b></td>
					<td><input type="password" name="c_pass" size="50" value="<?php echo $pass;?>"disabled/></td>
				</tr>
				<tr>
					<td align="right"><b>Adresse:</b></td>
					<td><textarea cols="50" rows="4" name="c_address" /><?php echo $address;?></textarea></td>
				</tr>
				<tr>
					<td align="right"><b>Ville:</b></td>
					<td><input type="text" name="c_city" size="50" value="<?php echo $city;?>"/></td>
				</tr>
				<tr>
					<td align="right"><b>Pays:</b></td>
					<td>   <select name="c_country">
							<option><?php echo $country;?></option>
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
					<td><input type="text" name="c_contact" size="50" value="<?php echo $contact;?>" required/></td>
				</tr>
				<tr>
					<td align="right"><b>Photo:</b></td>
					<td><input type="file" name="c_image"/><img src="customer_images/<?php echo $image;?>" width="50" height="50"</td>
				</tr>
				<tr align="center">

					<td colspan="8"><input type="submit" name="update" value="Modifier" /></td>
				</tr>
</table>

</form>

<?php
	if(isset($_POST['update'])){
	global $con;


	$customer_id = $c_id;

	//$c_name =$_POST['c_name'];
	//$c_first_name =$_POST['c_first_name'];
	//$c_email =$_POST['c_email'];
	//$c_pass =$_POST['c_pass'];
	$c_address =$_POST['c_address'];
	$c_city =$_POST['c_city'];
	$c_country =$_POST['c_country'];
	$c_contact =$_POST['c_contact'];

	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];

	move_uploaded_file($c_image_tmp,"customer_images/$c_image");

	$update_c = "update customers set customer_country='$c_country', customer_city='$c_city',
	customer_image='$c_image', customer_address='$c_address', customer_contact='$c_contact' where customer_id='$customer_id'";

	$run_update = mysqli_query($con, $update_c);

	if($run_update){

		echo "<script>alert(' Mise à jour réussie, Merci!!')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";

	}
}


?>
