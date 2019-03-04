<?php


 header("Content-Type: text/html; charset=ISO-8859-1");
//Seguranca

session_start(); // ready to go!
        
if ( ! isset($_SESSION['login'] ) || ! isset( $_SESSION['senha'] ) || ! isset($_SESSION['nivel'] )  ){
      header("Location: https://membros.neec-fct.com/");
      die();
}



function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}



if (strcmp( ip_info("Visitor", "Country") ,  "Portugal") !== 0) {
    echo 'Bloquear!!!';
}



echo '   

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="https://neec-fct.com/" class="simple-text">
                   <img src="/Panel/assets/img/neec.png"  width="70%" >
                </a>
            </div>

            <ul class="nav">
            
                <li>
                    <a href="index.php">
                        <i class="ti-user"></i>
                        <p>Lista de membros</p>
                    </a>
                </li>
          
         
                <li>
                    <a href="cal.php">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Calendário</p>
                    </a>
                </li>
                
                
        
                
                
                <li>
                    <a href="direccao.php">
                        <i class="fas fa-users"></i>
                        <p>Direcção</p>
                    </a>
                </li>
                
                
                
                <li>
                    <a href="contact.php">
                        <i class="fas fa-phone"></i>
                        <p>Contactos de empresas</p>
                    </a>
                </li>
                
                
                <li>
                    <a href="/Panel/PHP/porta.php">
                        <i class="fas fa-door-open"></i>
                        <p>Abrir Porta</p>
                    </a>
                </li>
                
                
                <li>
                    <a href="/Panel/PHP/logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Log out</p>
                    </a>
                </li>
                
            
          
		
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
              

                </div>
            </div>
        </nav>
        ';
