<?php
session_start();

if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

require_once "../classes/data.class.php";
require_once "../classes/nav.class.php";
require("../classes/opties.class.php");
require("../classes/edit.class.php");



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
    
    
    $test = new Nav;
    $test->Navbar($_SESSION['id']);
    
    ?>
    <form method="post" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Naam</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="naam">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Wachtwoord</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="wachtwoord">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email Adres</label>
    <input type="emailadres" step="0.01" class="form-control" id="exampleInputPassword1" name="emailadres">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Roll</label>
    <select name="roll" id="">
        <?php 
        
        $rollen = new Opties;
        $rollen->RolOpties();
        
        ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" name="editMedewerker">Submit</button>
</form>
</body>
</html>
