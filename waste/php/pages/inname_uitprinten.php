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
    <h4>Ingenomen Apparaten</h4>
    <table>
        <thead>
            <tr>
                <th>Apparaat</th>
                <th>Gewicht</th>
                <th>Tijdstip Ontvangst</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
            $innameBon = new Data;
            $innameBon->getInnameBon($_SESSION['id']);
            
            ?>
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