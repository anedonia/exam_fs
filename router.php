<?php
session_start();

	try 
	{
		if (!isset($_GET['action']))
		{
			include('./controller/login.php');
		}
		else 
		{
			switch ($_GET["action"]) {

				case  'LOGIN':
					include("./controller/login.php");
					break;
				case  'INSCRIPTION':
					include("./controller/register.php");
					break;
				case 'sign_out':
					include("./controller/sign_out.php");
					break;
				case  'shop':
					include("./controller/shop.php");
					break;
				case  'accueil':
					include("./controller/accueil.php");
					break;
				case  'account':
					include("./controller/voir_profil.php");
					break;
				case  'cart':
					include("./controller/voir_cart.php");
					break;
				default :
					include("./controller/login.php");
			}
		}
	}
	catch(Exeception $e)
	{
		echo 'Erreur : '. $e->getMessage();
	}
?>