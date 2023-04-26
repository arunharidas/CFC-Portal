<?php
    
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'cfcportal');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $districts = array("Thiruvananthapuram", "Kollam", "Pathanamthitta", "Alappuzha", "Kottayam", "Idukki", "Trissur", "Palakkad", "Malappuram", "Kozhikkod", "Vayanad", "Kannoor", "Kasargod");
?>
