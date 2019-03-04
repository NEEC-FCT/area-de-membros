<?php
   

    $con = mysqli_connect(SERVER-URL, SERVER-DB, DB-PASSWORD, DB-USERNAME);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST["pass"], FILTER_SANITIZE_STRING);
	$numero = filter_var($_POST["numero"], FILTER_SANITIZE_STRING);
    $telemovel= filter_var($_POST["cellphone"], FILTER_SANITIZE_STRING);
	
    $password = password_hash($password, PASSWORD_DEFAULT); 
	
	
	$mysqli = new mysqli(SERVER-URL, SERVER-DB, DB-PASSWORD, DB-USERNAME);
    $mysqli->set_charset("utf8mb4");
	
    $stmt = $mysqli->prepare("INSERT INTO `users`(  `password`, `nome`, `nroAluno`, `numTele`,  `email` , `dataEntrada` ) VALUES (?,?,?,?,? , CURRENT_TIMESTAMP) ");
    $stmt->bind_param("ssiis", $password , $name , $numero, $telemovel , $email);
    $stmt->execute();
  

    
 // the message
$msg = "Alguem se registo: " . $email;


// send email
mail("geral@neec-fct.com","NEEC Registo",$msg);


header("Location: https://neec-fct.com/membros/sucesso.html");
die();
	

