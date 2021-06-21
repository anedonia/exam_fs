<?php
session_start();
print_r($_SESSION);
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
				case  'register':
					include("./controller/register.php");
					break;
				case 'log_out':
					include("./controller/sign_out.php");
					break;
				case  'main_page':
					include("./controller/main_page.php");
					break;
				case  'accueil':
					include("./controller/accueil.php");
					break;
				case  'account':
					include("./controller/voir_profil.php");
					break;
				case  'admin':
					include("./controller/admin_page.php");
					break;
				default :
					include("./controller/main_page.php");
			}
		}
	}
	catch(Exeception $e)
	{
		echo 'Erreur : '. $e->getMessage();
	}
?>