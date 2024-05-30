<?php 
    $conn = new mysqli("localhost", "root", "","progetto città");
    if($conn->connect_error){
        die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
    }
?>