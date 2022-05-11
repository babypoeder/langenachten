<?php
session_start();

if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}


require("../classes/dbh.class.php");
require_once "../classes/data.class.php";
require_once "../classes/nav.class.php";
require_once "../classes/opties.class.php";



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

    <form action="">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tijdstip Uitgave</label>
    <input type="text" readonly="readonly" class="form-control" aria-describedby="emailHelp" name="date" value="<?= date("Y-m-d h:i:sa")?> ">
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Onderdeel</label><br>
    <select class="form-select" aria-label="Default select example">
    <?php 
    
    $onderdelen = new Opties;
    $onderdelen->OnderdeelOpties();
    
    ?>
    </select>
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Hoeveelheid (kg)</label>
    <input type="number" step="0.01" class="form-control" aria-describedby="emailHelp" name="hoeveelheid">
    </div>
    <a href='../pages/uitgifte_uitprinten.php?innameapparaatID=<?= $_SESSION['id']?>'><button type='button' class='btn btn-dark'>Uitgeven en vrachtbrief afdrukken</button></a>
    </form>

</body>
</html>
