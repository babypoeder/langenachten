<?php
session_start();

if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}


require("../classes/dbh.class.php");
require_once "../classes/data.class.php";
require_once "../classes/nav.class.php";
require('../classes/opties.class.php');
require('../classes/insert.class.php');




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Superior Waste - Remas</h3>
    <h4>Uitgiftebon</h4>
    <label for=""><?php  echo date("Y-m-d h:i:sa");?></label><br>
    <label for="">Bonnummer: </label>
    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Vergoeding</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>

    <button onclick="printFunction()">Print</button>​
 
    <script>
      //met deze script zorg je ervoor dat je html page uitgeprint word!
      function printFunction() { 
        window.print(); 
      }
      </script>
</body>
</html>