<?php 


class Edit extends Dbh
{   
    public function editOnderdeel($naam, $omschrijving, $voorraadkg, $prijsperkg, $id)
    {
        $sql = "UPDATE onderdelen SET Naam = ?, Omschrijving = ?, VoorraadKg= ?, PrijsPerKg= ? WHERE ID = ?";
        $stmt = $this->connect()->prepare($sql);
        if ($stmt->execute([$naam, $omschrijving, $voorraadkg, $prijsperkg, $id])) {
            header('location: onderdelen.php');
        }
    }

    public function editApparaat($naam, $omschrijving, $vergoeding, $gewichtgram, $id)
    {
        $sql = "UPDATE apparaten SET Naam = ?, Omschrijving = ?, Vergoeding= ?, GewichtGram= ? WHERE ID = ?";
        $stmt = $this->connect()->prepare($sql);
        if ($stmt->execute([$naam, $omschrijving, $vergoeding, $gewichtgram, $id])) {
            header('location: apparaten.php');
        }
    }

    public function editMedewerker($rolid, $naam, $wachtwoord, $emailadres, $id)
    {
        $sql = "UPDATE medewerkers SET RollID = ?, Naam = ?, Wachtwoord= ?, Emailadres= ? WHERE ID = ?";
        $stmt = $this->connect()->prepare($sql);
        if ($stmt->execute([$rolid, $naam, $wachtwoord, $emailadres, $id])) {
            header('location: ../pages/medewerkers.php');
        }
    }
}

if (isset($_POST['editOnderdeel'])) {
    $id = $_GET['onderdeelID'];
    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $voorraadkg = $_POST['voorraadkg'];
    $prijsperkg = $_POST['prijsperkg']; 
    $editOnderdeel = new Edit();
    $editOnderdeel->editOnderdeel($naam, $omschrijving, $voorraadkg, $prijsperkg, $id);
}

if (isset($_POST['editApparaat'])) {
    $id = $_GET['apparaatID'];
    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $vergoeding = $_POST['vergoeding'];
    $gewichtgram = $_POST['gewichtgram']; 
    $editApparaten = new Edit();
    $editApparaten->editApparaat($naam, $omschrijving, $vergoeding, $gewichtgram, $id);
}

if (isset($_POST['editMedewerker'])) {
    $id = $_GET['medewerkerID'];
    $rolID = $_POST['roll'];
    $naam = $_POST['naam'];
    $wachtwoord = $_POST['wachtwoord'];
    $emailadres = $_POST['emailadres'];
    $editMedewerker = new Edit();
    $editMedewerker->editMedewerker($rolID, $naam, $wachtwoord, $emailadres, $id);
}






?>