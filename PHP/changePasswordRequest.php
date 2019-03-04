<?php

    
    $con = mysqli_connect(SERVER-URL, SERVER-DB, DB-PASSWORD, DB-USERNAME);
    
    $email = $_GET["email"];
    $token = $_GET["hash"];
    $password = $_POST["password"];
   

    
    $stmtt = $con->prepare("SELECT `id` FROM `recover` WHERE `email` = ?  and `token` =  ?  and `usado`= 0  ");
    $stmtt->bind_param("ss", $email  ,  $token);
    $stmtt->execute();
    
    /* store result */
    $stmtt->store_result();
 
    $stmtt->fetch();
    if ( $stmtt->num_rows == 0){
           //redirecionar
        $response = array();
        $response["success"] = false;
        
        echo json_encode($response);
        exit;
    }
    
    //Update
    
    $stmtt = $con->prepare("UPDATE `recover` SET `usado`= 1  WHERE `email` = ? and `token` = ? ");
    $stmtt->bind_param("ss", $email  ,  $token);
    $stmtt->execute();
    
    $password =  password_hash( $password  , PASSWORD_DEFAULT);
    
    $stmtt = $con->prepare("UPDATE `users` SET  `password`= ? WHERE  `email` = ?");
    $stmtt->bind_param("ss", $password  ,  $email);
    $stmtt->execute();
    
    //redirecionar
    $response = array();
    $response["success"] = true;
    echo json_encode($response);
?>
