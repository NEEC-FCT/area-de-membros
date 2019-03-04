<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    


	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>NEEC - Dashboard</title>

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
    

<script>
function copyStringToClipboard (str) {
   // Create new element
   var el = document.createElement('textarea');
   // Set value (string to be copied)
   el.value = str;
   // Set non-editable to avoid focus and move outside of view
   el.setAttribute('readonly', '');
   el.style = {position: 'absolute', left: '-9999px'};
   document.body.appendChild(el);
   // Select text inside element
   el.select();
   // Copy text to clipboard
   document.execCommand('copy');
   // Remove temporary element
   document.body.removeChild(el);
}
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
    
    
    document.getElementById("clickCopyString").onclick = function() {
	copyToClipboard("This is a variable string");
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Direcção</h4>
                                <p class="category">2018 - 2019</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                              
                        

                 <table>
                          <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Função</th>
                            <th>Telemóvel</th>
                             <th>Email</th>
                            <th>Número de Aluno</th>
                            <th>Data Registo</th>
    
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
                            
                            $sql = 'SELECT nome , funcao , numTele ,email , nroAluno , dataEntrada  FROM `users` WHERE funcao not LIKE  "%Allumini%" AND funcao NOT LIKE "%Junior%"  AND funcao NOT LIKE "%Senior%" ORDER BY nome ASC';
                            $sql = 'SELECT nome , funcao , numTele ,email , nroAluno , dataEntrada  FROM `users` WHERE funcao not LIKE  "%Allumini%" AND funcao NOT LIKE "%Junior%"  AND funcao NOT LIKE "%Senior%" and aprovado = 1 ORDER BY nome ASC';
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                 
                                     echo"  <tr> ";
                                     
                                      echo  ' <td> ' .  $row["nome"]  . '</td>';
                                     if (strpos($row["nome"], 'Veloso') !== false) {
                                            echo  ' <td> Presidente &#x1F451; </td>';
                                        }
                                        else{
                                      echo  ' <td> ' .  $row["funcao"] . '</td>';
                                        }
                                      echo  ' <td> ' .  $row["numTele"]  . '</td>';
                                      
                                       echo  ' <td> ' .  $row["email"]  . '</td>';
                                        echo  ' <td> ' .  $row["nroAluno"]  . '</td>';
                                         echo  ' <td> ' .  $row["dataEntrada"]  . '</td>';
                                         
                                       
                                     echo  "</tr>";
                         
                         
                                }
                            } 
                            $conn->close();
                          
                          ?>
                          </tbody>
                        </table>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Membros Ativos
                               &emsp;  <button  onclick='copyStringToClipboard("<?php
                                   header("Content-Type: text/html; charset=ISO-8859-1");
               
                                                    
                            // Create connection
                            $conn = new mysqli(SERVER-URL, SERVER-DB, DB-PASSWORD, DB-USERNAME);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 
                            
                            $sql = 'SELECT email  FROM `users` WHERE  funcao not LIKE  "%Allumini%"  and aprovado = 1 ';
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                 
                                  
                                     
                                      echo   $row["email"]  . ',';
                                      
                                
                         
                                }
                            } 
                            $conn->close();
                               
                               ?>")' type="submit" class="btn btn-info btn-fill btn-wd">Copiar Emails</button>
                            </h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                           <th>Nome</th>
                                        <th>Função</th>
                                        <th>Telemóvel</th>
                                         <th>Email</th>
                                        <th>Número de Aluno</th>
                                        <th>Data Registo</th>
                                    </thead>
                                    <tbody>
                                     
                                        <?php
                         header("Content-Type: text/html; charset=ISO-8859-1");
               
                                                    
                            // Create connection
                            $conn = new mysqli(SERVER-URL, SERVER-DB, DB-PASSWORD, DB-USERNAME);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 
                            
                            $sql = 'SELECT nome , funcao , numTele ,email , nroAluno , dataEntrada  FROM `users` WHERE  funcao not LIKE  "%Allumini%" AND funcao  LIKE "%Junior%"  or funcao  LIKE "%Senior%" and aprovado = 1  ORDER BY nome ASC';
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                 
                                     echo"  <tr> ";
                                     
                                      echo  ' <td> ' .  $row["nome"]  . '</td>';
                                      
                                      echo  ' <td> ' .  $row["funcao"] . '</td>';
                                      echo  ' <td> ' .  $row["numTele"]  . '</td>';
                                      
                                       echo  ' <td> ' .  $row["email"]  . '</td>';
                                        echo  ' <td> ' .  $row["nroAluno"]  . '</td>';
                                         echo  ' <td> ' .  $row["dataEntrada"]  . '</td>';
                                         
                                       
                                     echo  "</tr>";
                         
                         
                                }
                            } 
                            $conn->close();
                          
                          ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Membros Alumni </h4>
                            
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                          <th>Nome</th>
                                        <th>Função</th>
                                        <th>Telemóvel</th>
                                         <th>Email</th>
                                        <th>Número de Aluno</th>
                                        <th>Data Registo</th>
                                    </thead>
                                    <tbody>
                                     
                                        <?php
                         header("Content-Type: text/html; charset=ISO-8859-1");
               
                                                    
                            // Create connection
                            $conn = new mysqli(SERVER-URL, SERVER-DB, DB-PASSWORD, DB-USERNAME);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 
                            
                            $sql = 'SELECT nome , funcao , numTele ,email , nroAluno , dataEntrada  FROM `users` WHERE  funcao  LIKE  "%Allumini%" and aprovado = 1 ORDER BY nome ASC';
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                 
                                     echo"  <tr> ";
                                     
                                      echo  ' <td> ' .  $row["nome"]  . '</td>';
                                      echo  ' <td> ' .  $row["funcao"] . '</td>';
                                      echo  ' <td> ' .  $row["numTele"]  . '</td>';
                                      
                                       echo  ' <td> ' .  $row["email"]  . '</td>';
                                        echo  ' <td> ' .  $row["nroAluno"]  . '</td>';
                                         echo  ' <td> ' .  $row["dataEntrada"]  . '</td>';
                                         
                                       
                                     echo  "</tr>";
                         
                         
                                }
                            } 
                            $conn->close();
                          
                          ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
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

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
