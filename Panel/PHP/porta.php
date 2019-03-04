<?php

session_start();



if ( ! isset($_SESSION['login'] ) || ! isset( $_SESSION['senha'] ) || ! isset($_SESSION['nivel'] )  ){
      header("Location: https://membros.neec-fct.com/");
      die();
}
else{
    
        
        if( strpos( $_SESSION['nivel'] , 'admin') !== false ){
            
             echo "<script>
            alert('Só a direcção pode abrir a porta');
            window.location.href='/Panel';
            </script>";    
            
        }
        
        else{
                $mysqli = new mysqli(SERVER-URL, DB-USERNAME, DB-PASSWORD , SERVER-DB);
        
                if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit();
                }
        
        
            $date = date("D M d, Y G:i");
            
            $one = 1;
            
            $statement = mysqli_prepare($mysqli, "INSERT INTO historicoapp (Nome, Data) VALUES (?, ?)");
            mysqli_stmt_bind_param($statement, "ss",  $_SESSION['login']  , $date  );
            mysqli_stmt_execute($statement);
        
        
        
            $sql = "UPDATE `porta` SET `Estado`= '1'";
            
            $mysqli->query($sql);
            
        
            
            echo "<script>
            alert('Porta vai abrir Brevemente');
            window.location.href='/Panel';
            </script>";    
        }


}
