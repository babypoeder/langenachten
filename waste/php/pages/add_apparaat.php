<?php


require('../classes/dbh.class.php');
require("../classes/nav.class.php");

session_start();

if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}



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

<form method="post" action="../classes/insert.class.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Naam</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="naam">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Omschrijving</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="omschrijving">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Vergoeding</label>
    <input type="number" step="0.01" class="form-control" id="exampleInputPassword1" name="vergoeding">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Gewicht In Gram</label>
    <input type="number" step="0.01" class="form-control" id="exampleInputPassword1" name="gewichtgram">
  </div>
  <button type="submit" class="btn btn-primary" name="addApparaat">Submit</button>
</form>
    
</body>
</html>