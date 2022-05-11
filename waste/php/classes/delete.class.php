<?php 

require("dbh.class.php");


class Delete extends Dbh
{
    public function DeleteOnderdeel($id)
    {
        $sql = "DELETE FROM onderdelen WHERE ID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            header("location: ../pages/onderdelen.php");
        }
    }

    public function DeleteApparaten($id)
    {
        $sql = "DELETE FROM apparaten WHERE ID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            header("location: ../pages/apparaten.php");
        }
    }

    public function DeleteMedewerker($id)
    {
        $sql = "DELETE FROM medewerkers WHERE ID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            header("location: ../pages/medewerkers.php");
        }
    }

    public function DeleteOnderdeelApparaat($id, $apparaatID)
    {
        $sql = "DELETE FROM onderdeelapparaat WHERE ID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            header("location: ../pages/apparaat_details.php?apparaatID=" . $apparaatID );
        }
    }

    public function DeleteInnameApparaat($id)
    {
        $sql = "DELETE FROM innameapparaat WHERE ID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            header("location: ../pages/inname.php");
        }
    }
}

if (isset($_GET['onderdeelID'])) {
    $id = $_GET['onderdeelID'];
    $deleteOnderdeel = new Delete();
    $deleteOnderdeel->DeleteOnderdeel($id);
}

if (isset($_GET['apparaatID'])) {
    $id = $_GET['apparaatID'];
    $deleteApparaat = new Delete();
    $deleteApparaat->DeleteApparaten($id);
}

if (isset($_GET['medewerkerID'])) {
    $id = $_GET['medewerkerID'];
    $deleteMedewerker = new Delete();
    $deleteMedewerker->DeleteMedewerker($id);
}

if (isset($_GET['onderdeelapparaatID'])) {
    $id = $_GET['onderdeelapparaatID'];
    $deleteOnderdeelApparaat = new Delete();
    $deleteOnderdeelApparaat->DeleteOnderdeelApparaat($id, $apparaatID);
}

if (isset($_GET['innameapparaatID'])) {
    $id = $_GET['innameapparaatID'];
    $deleteInnameApparaat = new Delete();
    $deleteInnameApparaat->DeleteInnameApparaat($id);
}



?>