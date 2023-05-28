<?php
    $host = "localhost"; //server name
    $dbUsername = "id20090326_root";
    $dbPassword = "12charactersUPPERCASELETTER!";
    $dbname = "id20090326_railwaysystem";

    //Creating connection to database
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    //Checking connection
    if (mysqli_connect_error())
    {
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
?> 