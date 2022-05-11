<?php 

require_once "dbh.class.php";



class Add extends Dbh
{
    public function addOnderdeel($naam, $omschrijving, $voorraadkg, $prijsperkg)
    {
        $sql = "INSERT INTO onderdelen(Naam, Omschrijving, VoorraadKg, PrijsPerKg) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$naam, $omschrijving, $voorraadkg, $prijsperkg]);
        header("location: onderdelen.php");
    }

    public function addOnderdeelApparaat($naam, $omschrijving, $voorraadkg, $prijsperkg, $apparaatid, $percentage)
    {
        $sql = "
        BEGIN;
        INSERT INTO onderdelen (Naam, Omschrijving, VoorraadKg, PrijsPerKg)
        VALUES(:naam, :omschrijving, :voorraadkg, :prijsperkg);
        INSERT INTO onderdeelapparaat (OnderdeelID, ApparaatID, Percentage) 
        VALUES( LAST_INSERT_ID(), :apparaatid, :percentage);
        COMMIT;
        
        ";

        
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":naam", $naam);
        $stmt->bindParam(":omschrijving", $omschrijving);
        $stmt->bindParam(":voorraadkg", $voorraadkg);
        $stmt->bindParam(":prijsperkg", $prijsperkg);
        $stmt->bindParam(":apparaatid", $apparaatid);
        $stmt->bindParam(":percentage", $percentage);
        $stmt->execute();
        header("location: apparaat_details.php?apparaatID=" . $_GET['apparaatID'] );
    }
    
    public function addApparaat($naam, $omschrijving, $vergoeding, $gewichtgram)
    {
        $sql = "INSERT INTO apparaten(Naam, Omschrijving, Vergoeding, GewichtGram) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$naam, $omschrijving, $vergoeding, $gewichtgram]);
        header('location: ../pages/apparaten.php');
    }

    

    public function addMedewerker($rolid, $naam, $wachtwoord, $emailadres)
    {
        $sql = "INSERT INTO medewerkers(RollID, Naam, Wachtwoord, Emailadres) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$rolid, $naam, $wachtwoord, $emailadres]);
        header('location: ../pages/medewerkers.php');
    }



    // public function addInname($medewerkerid)
    // {
    //     $sql = "INSERT INTO innames(MedewerkerID) VALUES (?)";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$medewerkerid]);
    //     $lastId = $this->connect()->lastInsertId();
    //     header('location: ../pages/add_inname.php?innameID=' . $lastId);
    // }

    public function addInname($medewerkerid, $ontleed, $apparaatid)
    {
        $sql = "
        BEGIN;
        INSERT INTO innames (MedewerkerID)
        VALUES(:medewerkerID);
        INSERT INTO innameapparaat (InnameID, ApparaatID, Ontleed) 
        VALUES( LAST_INSERT_ID(), :apparaatid, :ontleed);
        COMMIT;
        
        ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":medewerkerID", $medewerkerid);
        $stmt->bindParam(":apparaatid", $apparaatid);
        $stmt->bindParam(":ontleed", $ontleed);
        $stmt->execute();
        header('location: ../pages/inname.php');
    }
}


if (isset($_POST['addOnderdeel'])) {
    $naam = $_POST["naam"];
    $omschrijving = $_POST["omschrijving"];
    $voorraadkg = $_POST["voorraadkg"];
    $prijsperkg = $_POST["prijsperkg"];
    $addOnderdeel = new Add();
    $addOnderdeel->addOnderdeel($naam, $omschrijving, $voorraadkg, $prijsperkg);
}

if (isset($_POST['addApparaat'])) {
    $naam = $_POST["naam"];
    $omschrijving = $_POST["omschrijving"];
    $vergoeding = $_POST["vergoeding"];
    $gewichtgram = $_POST["gewichtgram"];
    $addApparaat = new Add();
    $addApparaat->addApparaat($naam, $omschrijving, $vergoeding, $gewichtgram);
}


if (isset($_POST['addOnderdeelApparaat'])) {
    $naam = $_POST["naam"];
    $omschrijving = $_POST["omschrijving"];
    $voorraadkg = $_POST["voorraadkg"];
    $prijsperkg = $_POST["prijsperkg"];
    $apparaatid = $_GET["apparaatID"];
    $percentage = $_POST["percentage"];
    $addOnderdeelApparaat = new Add();
    $addOnderdeelApparaat->addOnderdeelApparaat($naam, $omschrijving, $voorraadkg, $prijsperkg, $apparaatid, $percentage);
}

if (isset($_POST['addMedewerker'])) {
    $rolid = $_POST["roll"];
    $naam = $_POST["naam"];
    $wachtwoord = $_POST["wachtwoord"];
    $emailadres = $_POST["emailadres"];
    $addMedewerker = new Add();
    $addMedewerker->addMedewerker($rolid, $naam, $wachtwoord, $emailadres);
}

if (isset($_POST['addInname'])) {
    $medewerkerid = $_SESSION['id'];
    $apparaatid = $_POST['apparaatID'];
    $ontleed = $_POST['ontleed'];
    $addInname = new Add();
    $addInname->addInname($medewerkerid, $ontleed, $apparaatid);
}

?>