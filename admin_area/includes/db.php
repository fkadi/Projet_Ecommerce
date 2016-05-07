<?php

$con = mysqli_connect("localhost","root","","ecommerce");

if (mysqli_connect_errno())
	{
		echo " échec de connexion avec la base de données :" .mysqli_connect_error();
	}
?>
