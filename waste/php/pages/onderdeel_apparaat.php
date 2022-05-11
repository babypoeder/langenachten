<?php
session_start();

if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}


require("../classes/dbh.class.php");
require("../classes/nav.class.php");
require_once("../classes/opties.class.php");
require "../classes/insert.class.php"






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

<form method="post">
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Naam</label>
    <input type="text" step="0.01"  class="form-control" id="exampleInputPassword1" name="naam">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Omschrijving</label>
    <input type="text" step="0.01"  class="form-control" id="exampleInputPassword1" name="omschrijving">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Voorraad in KG</label>
    <input type="number" step="0.01"  class="form-control" id="exampleInputPassword1" name="voorraadkg">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prijs per KG</label>
    <input type="number" step="0.01"  class="form-control" id="exampleInputPassword1" name="prijsperkg">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">% van het gewicht</label>
    <input type="number" step="0.01"  class="form-control" id="exampleInputPassword1" name="percentage">
  </div>
  <button type="submit" name="addOnderdeelApparaat" class="btn btn-primary">Submit</button>
</form>
<!----------------------------- USER HOME SCREEN END ------------------------->
    
</body>
</html>