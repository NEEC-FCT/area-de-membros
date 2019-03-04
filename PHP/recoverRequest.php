<?php
 
    $con = mysqli_connect(SERVER-URL, SERVER-DB, DB-PASSWORD, DB-USERNAME);
    
    $email = $_POST["email"];
   
    $password = rand(999, 99999);
    $password_hash = md5($password);
    
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    
    $stmtt = $con->prepare("SELECT * FROM `users` WHERE email = ? ");
    $stmtt->bind_param("s", $email );
    $stmtt->execute();
    
    /* store result */
    $stmtt->store_result();
    /* Bind the result to variables */
    
    $stmtt->fetch();
    if ( $stmtt->num_rows == 0){
        $response = array();
        $response["success"] = false;
        
        echo json_encode($response);
        exit;
    }
    
    

    $statement = mysqli_prepare($con, "INSERT INTO `recover`( `email`, `token`, `IP`) VALUES (  ? , ? , ? )");
    mysqli_stmt_bind_param($statement, "sss", $email , $password_hash , $ip );
    mysqli_stmt_execute($statement);
    
	

    
	
    $html = '<!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>NEEC Password</title>
    
    <style type="text/css">
    body{ margin: 0; padding: 0; }
    img{ border: 0px; display: block; }
    
    .socialLinks{ font-size: 6px; }
    .socialLinks a{
    display: inline-block;
    }
    
    .long-text p{ margin: 1em 0px; }
    .long-text p:last-child{ margin-bottom: 0px; }
    .long-text p:first-child{ margin-top: 0px; }
    </style>
    <style type="text/css">
    /* yahoo, hotmail */
    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{ line-height: 100%; }
    .yshortcuts a{ border-bottom: none !important; }
    .vb-outer{ min-width: 0 !important; }
    .RMsgBdy, .ExternalClass{
    width: 100%;
        background-color: #3f3f3f;
        background-color: #3f3f3f}
        
        /* outlook/office365 add buttons outside not-linked images and safari have 2px margin */
        [o365] button{ margin: 0 !important; }
        
        /* outlook */
        table{ mso-table-rspace: 0pt; mso-table-lspace: 0pt; }
        #outlook a{ padding: 0; }
        img{ outline: none; text-decoration: none; border: none; -ms-interpolation-mode: bicubic; }
        a img{ border: none; }
        
        @media screen and (max-width: 600px) {
            table.vb-container, table.vb-row{
            width: 95% !important;
            }
            
            .mobile-hide{ display: none !important; }
            .mobile-textcenter{ text-align: center !important; }
            
            .mobile-full{
            width: 100% !important;
                max-width: none !important;
            }
        }
   
        </style>
        <style type="text/css">
        
        #ko_textBlock_4 .links-color a, #ko_textBlock_4 .links-color a:link, #ko_textBlock_4 .links-color a:visited, #ko_textBlock_4 .links-color a:hover{
    color: #3f3f3f;
    color: #3f3f3f;
        text-decoration: underline
    }
    
    #ko_socialBlock_7 .links-color a, #ko_socialBlock_7 .links-color a:link, #ko_socialBlock_7 .links-color a:visited, #ko_socialBlock_7 .links-color a:hover{
color: #cccccc;
color: #cccccc;
    text-decoration: underline
    }
    
    #ko_footerBlock_2 .links-color a, #ko_footerBlock_2 .links-color a:link, #ko_footerBlock_2 .links-color a:visited, #ko_footerBlock_2 .links-color a:hover{
color: #cccccc;
color: #cccccc;
    text-decoration: underline
    }
    </style>
    
    </head>
    <body bgcolor="#3f3f3f" text="#919191" alink="#cccccc" vlink="#cccccc" style="margin: 0; padding: 0; background-color: #3f3f3f; color: #919191;"><center>
    
    
    
    <table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" style="background-color: #ffffff;" id="ko_logoBlock_3">
    <tbody><tr><td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
    <!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
    --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="9" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; max-width: 570px; -mru-width: 0px;" width="570" class="vb-row">
    
    <tbody><tr>
    <td align="center" valign="top" style="font-size: 0;"><div style="vertical-align: top; width: 100%; max-width: 276px; -mru-width: 0px;"><!--
    --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" width="276" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px;">
    
    <tbody><tr><td width="100%" valign="top" align="center" class="links-color"><!--[if (lte ie 8)]><div style="display: inline-block; width: 258px; -mru-width: 0px;"><![endif]--><img alt="" border="0" hspace="0" align="center" vspace="0" width="258" style="border: 0px; display: block; vertical-align: top; height: auto; margin: 0 auto; color: #f3f3f3; font-size: 18px; font-family: Arial, Helvetica, sans-serif; width: 100%; max-width: 258px; height: auto;" src="https://mosaico.io/srv/f-uyv9mjd/img?src=https%3A%2F%2Fmosaico.io%2Ffiles%2Fuyv9mjd%2FNEEC-2.png&amp;method=resize&amp;params=258%2Cnull"><!--[if (lte ie 8)]></div><![endif]--></td></tr>
    
    </tbody></table></div></td>
    </tr>
    
    </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
    
    </td></tr>
    </tbody></table><table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" style="background-color: #ffffff;" id="ko_textBlock_4">
    <tbody><tr><td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
    <!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
    --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="18" bgcolor="#ffffff" width="570" class="vb-container" style="border-collapse: separate; width: 100%; background-color: #ffffff; mso-cellspacing: 18px; border-spacing: 18px; max-width: 570px; -mru-width: 0px;">
    
    <tbody><tr><td class="long-text links-color" width="100%" valign="top" align="left" style="font-weight: normal; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: left; line-height: normal;"><p style="margin: 1em 0px; margin-top: 0px;">Escolha uma senha forte e não a reutilize em outras contas.</p>
    <p style="margin: 1em 0px; margin-bottom: 0px;">A alteração da sua senha desconectará você de todos os seus dispositivos. Você terá que inserir a nova senha quando fizer login novamente.</p></td></tr>
    
    </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
    </td></tr>
    </tbody></table><table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" style="background-color: #ffffff;" id="ko_buttonBlock_5">
    <tbody><tr><td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
    <!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
    --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="18" bgcolor="#ffffff" width="570" class="vb-container" style="border-collapse: separate; width: 100%; background-color: #ffffff; mso-cellspacing: 18px; border-spacing: 18px; max-width: 570px; -mru-width: 0px;">
    
    <tbody><tr>
    <td valign="top" align="center"><table role="presentation" cellpadding="12" border="0" align="center" cellspacing="0" style="border-spacing: 0; mso-padding-alt: 12px 12px 12px 12px;"><tbody><tr>
    <td width="auto" valign="middle" align="center" bgcolor="#bfbfbf" style="text-align: center; font-weight: normal; padding: 12px; padding-left: 14px; padding-right: 14px; background-color: #bfbfbf; color: #3f3f3f; font-size: 22px; font-family: Arial, Helvetica, sans-serif; border-radius: 4px;"><a style="text-decoration: none; font-weight: normal; color: #3f3f3f; font-size: 22px; font-family: Arial, Helvetica, sans-serif;" target="_new" href="https://membros.neec-fct.com/PHP/changePassword.php?hash=' . $password_hash .   '&email='.$email .'">Mudar Password</a></td>
    </tr></tbody></table></td>
    </tr>
    
    </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
    </td></tr>
    </tbody></table><table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#3f3f3f" style="background-color: #3f3f3f;" id="ko_socialBlock_7">
    <tbody><tr><td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
    <!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
    --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="9" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; max-width: 570px; -mru-width: 0px;" width="570" class="vb-row">
    
    <tbody><tr>
    <td align="center" valign="top" style="font-size: 0;"><div style="width: 100%; max-width: 552px; -mru-width: 0px;"><!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="552"><tr><![endif]--><!--
    --><!--
    --><!--[if (gte mso 9)|(lte ie 8)]><td align="left" valign="top" width="276"><![endif]--><!--
    --><div class="mobile-full" style="display: inline-block; vertical-align: top; width: 100%; max-width: 276px; -mru-width: 0px; min-width: calc(50%); max-width: calc(100%); width: calc(304704px - 55200%);"><!--
    --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);" width="276" align="left">
    
    <tbody>
    
    </tbody></table><!--
    --></div><!--[if (gte mso 9)|(lte ie 8)]></td><![endif]--><!--
    --><!--[if (gte mso 9)|(lte ie 8)]><td align="left" valign="top" width="276"><![endif]--><!--
    --><div class="mobile-full" style="display: inline-block; vertical-align: top; width: 100%; max-width: 276px; -mru-width: 0px; min-width: calc(50%); max-width: calc(100%); width: calc(304704px - 55200%);"><!--
    --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);" width="276" align="left">
    
    <tbody><tr><td width="100%" valign="top" style="font-size: 6px; font-weight: normal; text-align: right;" align="right" class="links-color socialLinks mobile-textcenter">
    
    &nbsp;<a target="_new" href="https://www.facebook.com/neecfct/" style="display: inline-block; color: #cccccc; color: #cccccc; text-decoration: underline;"><img border="0" style="border: 0px; display: inline-block; vertical-align: top; padding-bottom: 0px; background: url(https://), #3b5998; border-radius: 50px;" src="https://mosaico.io/templates/versafix-1/img/icons/fb-colors-96.png" width="32" height="32" alt="Facebook"></a>
    
    
    
    
    
    
    
    &nbsp;<a target="_new" href="https://www.linkedin.com/company/neec---n-cleo-de-engenharia-electrot-cnica-e-de-computadores/" style="display: inline-block; color: #cccccc; color: #cccccc; text-decoration: underline;"><img border="0" style="border: 0px; display: inline-block; vertical-align: top; padding-bottom: 0px; background: url(https://), #007bb6; border-radius: 50px;" src="https://mosaico.io/templates/versafix-1/img/icons/in-colors-96.png" width="32" height="32" alt="Linkedin"></a>
    
    
    
    
    
    
    
    &nbsp;<a target="_new" href="https://www.instagram.com/neecfct/" style="display: inline-block; color: #cccccc; color: #cccccc; text-decoration: underline;"><img border="0" style="border: 0px; display: inline-block; vertical-align: top; padding-bottom: 0px; background: url(https://), #bc2a8d; border-radius: 50px;" src="https://mosaico.io/templates/versafix-1/img/icons/inst-colors-96.png" width="32" height="32" alt="Instagram"></a>
    
    
    
    </td></tr>
    
    
    </tbody></table><!--
    --></div><!--[if (gte mso 9)|(lte ie 8)]></td><![endif]--><!--
    --><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></tr></table><![endif]--></div></td>
    </tr>
    
    </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
    </td></tr>
    </tbody></table>
    
    
    <!-- footerBlock -->
    <table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#3f3f3f" style="background-color: #3f3f3f;" id="ko_footerBlock_2">
    <tbody><tr><td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
    <!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
    --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; width: 100%; mso-cellspacing: 0px; border-spacing: 0px; max-width: 570px; -mru-width: 0px;" width="570" class="vb-row">
    
    </table></div></td>
    </tr>
    
    </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
    </td></tr>
    </tbody></table>
    <!-- /footerBlock -->
    
    </center></body></html> ';
	
	
	require 'mail/PHPMailerAutoload.php';
	  //enviar email
    $mail = new PHPMailer;
    
    $mail->From      = 'geral@neec-fct.com';
    $mail->FromName  = 'Reset Password Membro';
    $mail->Subject   = 'Mudar Password';
    $mail->isHTML(true);
    $mail->Body      = $html;   
    $mail->AddAddress( $email );
    $mail->CharSet = 'UTF-8';
    
  
    
    $mail->Send();
    
    $response = array();
    //tenho que trocar por url
    $response["success"] = true;
    echo json_encode($response);
?>
