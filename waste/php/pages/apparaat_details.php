<?php
session_start();

if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}


require("../classes/dbh.class.php");
require("../classes/nav.class.php");
require("../classes/data.class.php");

$id = $_GET['apparaatID'];



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
<!----------------------------- USER HOME SCREEN BEGIN ------------------------->
<table>
    <thead>
        <tr>
            <th>Naam</th>
            <th>omschrijving</th>
            <th>vergoeding</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $apparaat = new Data();
        $apparaat->getApparaat($_GET['apparaatID']);
        
        
        ?>
    </tbody>
</table>
<table>
    <thead>
        <tr>
            <th><h3>Onderdelen van dit apparaten</h3></th>
            <th><h3><a href="onderdeel_apparaat.php?apparaatID=<?= $_GET['apparaatID'] ?>"><button type="button" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg></button></a></h3></th>
        </tr>
    </thead>
    <thead>
        <tr>
            <th>Onderdeel</th>
            <th>% van het gewicht</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        $onderdelen = new Data();
        $onderdelen->getOnderdeelApparaat($id);
        
        ?>
    </tbody>
</table>
<!----------------------------- USER HOME SCREEN END ------------------------->
    
</body>
</html>