<?php

session_start();

if ( ! isset($_SESSION['login'] ) || ! isset( $_SESSION['senha'] ) || ! isset($_SESSION['nivel'] )  ){
      header("Location: https://membros.neec-fct.com/");
      die();
}
else{
    

/*session is started if you don't write this line can't use $_Session  global variable*/

    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    unset($_SESSION['nivel']);
    header("Location: https://membros.neec-fct.com/");
    die();
}
