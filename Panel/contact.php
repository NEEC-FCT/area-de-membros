<?php


session_start();

echo $_SESSION['nivel'];
if( !(strpos( $_SESSION['nivel'] , 'Admin') !== false ) ){
    //Bloquear
   $to      = 'joao.veloso@neec-fct.com';
    $subject = 'Detectado fora de Portugal em ' . $_SESSION['login'];
    $message = 'Detectado';
    $headers = 'From: geral@neec-fct.com' . "\r\n" .
        'Reply-To: geral@neec-fct.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    unset($_SESSION['nivel']);
    header("Location: https://neec-fct.com/");
    die();
}


?>



<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>NEEC Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
    <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

       
        <?php
        
  header("Content-Type: text/html; charset=ISO-8859-1");
   
       include($_SERVER['DOCUMENT_ROOT'].'/Panel/PHP/nav.php');
       
       
        ?>

		<div class="content">
            <div class="container-fluid">
                <div class="card card-map">
					<div class="header">
                        <h4 class="title">2018 - 2019</h4>
                    </div>
                    
                    
                    <div class="content">
                        
                      <input id="myInput" type="text" placeholder="Search..">
<br><br>

                        <table>
                          <thead>
                          <tr>
                            <th>Empresa</th>
                            <th>Categoria</th>
                            <th>Origem contacto</th>
                             <th>Nome</th>
                            <th>Cargo</th>
                            <th>Contacto</th>
                            <th>Email</th>
                          </tr>
                          </thead>
                          
                          <tbody id="myTable">
                       
                         <?php
                         header("Content-Type: text/html; charset=ISO-8859-1");
               
                                                    
                            // Create connection
                            $conn = new mysqli(SERVER-URL, SERVER-DB, DB-PASSWORD, DB-USERNAME);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 
                            
                            $sql = 'SELECT empresa,categoria,origem ,contacto,cargo,telemovel,email FROM Empresas';
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                 
                                     echo"  <tr> ";
                                     
                                      echo  ' <td> ' .  $row["empresa"]  . '</td>';
                                      echo  ' <td> ' .  $row["categoria"] . '</td>';
                                      echo  ' <td> ' .  $row["origem"]  . '</td>';
                                      
                                       echo  ' <td> ' .  $row["contacto"]  . '</td>';
                                        echo  ' <td> ' .  $row["cargo"]  . '</td>';
                                         echo  ' <td> ' .  $row["telemóvel"]  . '</td>';
                                          echo  ' <td> ' .  $row["email"]  . '</td>';
                                       
                                     echo  "</tr>";
                         
                         
                                }
                            } else {
                                echo "0 resultss";
                            }
                            $conn->close();
                          
                          ?>
                          </tbody>
                        </table>
                
					
					</div>
			
				</div>
			</div>
		</div>

       <?php
        
       include($_SERVER['DOCUMENT_ROOT'].'/Panel/PHP/footer.php');
       
        ?>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>


    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>



</html>
