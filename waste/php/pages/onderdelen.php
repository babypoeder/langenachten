<?php

session_start();

if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}


require("../classes/dbh.class.php");
require("../classes/nav.class.php");
require("../classes/data.class.php");


?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php
    
    
    $nav = new Nav;
    $nav->Navbar($_SESSION['id']);
    
    ?>
<a href="add_onderdeel.php"><button type="button" class="btn btn-primary" style="margin: 10px">Toevoegen</button></a>
<table>
    <thead>
        <tr>
            <th>Naam</th>
            <th>Omschrijving</th>
            <th>VoorraadKg</th>
            <th>PrijsPerKg</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        
        $onderdelen = new Data();
        $onderdelen->getOnderdelen();
        
        
        ?>
    </tbody>
</table>
    
</body>
</html>