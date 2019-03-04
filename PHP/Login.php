<?php
  
 

    $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
	

	


    $mysqli = new mysqli(SERVER-URL, SERVER-DB, DB-PASSWORD, DB-USERNAME);
    $mysqli->set_charset("utf8mb4");
    $stmt = $mysqli->prepare("SELECT `password`, `nome` , `nivelAcesso` FROM `users` WHERE `aprovado` = 1 and `email` = ? ");
    $stmt->bind_param("s", $email);
    
    
    /* execute query */
    $stmt->execute();
    
    /* Store the result (to get properties) */
    $stmt->store_result();
    
    /* Get the number of rows */
    $num_of_rows = $stmt->num_rows;
    
    /* Bind the result to variables */
    $stmt->bind_result( $passworddb , $nome , $nivelAcesso);
    
    $stmt->fetch();
           
    
    
    
    if (  $num_of_rows   == 0) {
        header("Location: https://membros.neec-fct.com/index.php?problem=1");
        
        die();
    }
    
   // echo $passworddb ;
    //verificar conta
    if ( password_verify(  $password , $passworddb )  ){
      //  echo "true"  ;
        session_start(); // ready to go!
        $_SESSION['login'] = $email;
        $_SESSION['senha'] = $passworddb;
        $_SESSION['nivel'] = $nivelAcesso;
		// either new or old, it should live at most for another hour
		$_SESSION['discard_after'] = $now + 3600 * 2;
        // server should keep session data for AT LEAST 1 hour
        ini_set('session.gc_maxlifetime', 3600 * 2);
        
        // each client should remember their session id for EXACTLY 1 hour
        session_set_cookie_params(3600 * 2);
        
        
        
        
        header("Location: https://membros.neec-fct.com/Panel/");
        die();
    }
    
    else{
       header("Location: https://membros.neec-fct.com/index.php?problem=2");
        die();
    }
    
    
   
    ?>
