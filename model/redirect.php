<?php session_start();  ?>

<?php 
$perfil= $_SESSION['perfil_id'] ;

switch ($perfil) {
	case '1':
		header('Location: ../views/home/Admin/index.php'); 
		break;

	case '2':
	header('Location: ../views/home/Cliente/index.php'); 
		break;

	case '3':
	header('Location: ../views/home/ClienteF/index.php'); 
		break;		
	
	default:
		# code...
		break;
}




?>