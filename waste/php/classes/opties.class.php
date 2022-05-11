<?php 



class Opties extends Dbh
{
    public function OnderdeelOpties()
    {
        $sql = "SELECT * FROM onderdelen";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value=' . $row["ID"] .'>'. $row["Naam"] . '</option>';
        }
    }

    public function RolOpties()
    {
        $sql = "SELECT * FROM rollen";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value=' . $row["ID"] .'>'. $row["Naam"] . '</option>';
        }
    }

    public function ApparaatOpties()
    {
        $sql = "SELECT * FROM apparaten";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value=' . $row["ID"] .'>'. $row["Naam"] . '</option>';
        }
    }
}








?>