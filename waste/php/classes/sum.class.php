<?php 


class Sum extends Dbh
{
    public function inkoopSum()
    {
        $sql = "SELECT sum(VoorraadKg) FROM onderdelen";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo $row[0];
        }
    }
}





?>