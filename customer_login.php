<div><h1 style="color:#FF4500;"> Mon espace client<h1></div>
<div> 
	</br></br></br>
	<form method="post" action="" >
		<table width="500" align="center" bgcolor="">
			<tr align="center">
				<td colspan="4"><h2>Identifiez-vous pour poursuivre<h2></td>

			</tr>
<tr>
<td align="right"> <b>*Email:</b></td>
<td><input type="text" name="email" placeholder="Entrer email"/></td>
</tr>

<tr>
<td align="right"><b>*Mot de passe:</b></td>
<td><input type="password" name="pass" placeholder="Entrer mot de passe"/></td>
</tr>

<tr align="center">
<td colspan="4"><input type="submit" name="login" value="Valider"/></td>
</tr>
<tr align="center">
<td colspan="4"><a href="checkout.php?forgot_pass">Mot de passe oublié ?</a></td>
</tr>
		</table>
</br></br>

<h2 style="float:center;"><a href="customer_register.php">**Vous êtes nouveau client? créer votre compte**</a><h2>

	</form>

</div>

<?php 

 if(isset($_POST['login'])){
	global $con;
        $c_email =$_POST['email'];
	$c_pass =$_POST['pass'];

	include("includes/db.php");
	$insert_c = " select * from customers where customer_email ='$c_email' and customer_pass ='$c_pass'";
	$run_c = mysqli_query($con, $insert_c);
	$check = mysqli_num_rows($run_c);

			if($check > 0){
				
                                session_start();
				$_SESSION['customer_email']=$c_email;

				
			        echo "<script>window.open('index.php','_self')</script>";


			}
			else{
				echo "<script>alert('Email ou le mot de passe est invalide!!')</script>";
				echo "<script>window.open('checkout.php','_self')</script>";
				
                         }

}


?>
