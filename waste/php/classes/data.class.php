<?php



class Data extends Dbh
{
    public function getOnderdelen()
    {
        $sql = "SELECT * FROM onderdelen";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['Naam'] . "</td>";
            echo "<td>" . $row['Omschrijving'] . "</td>";
            echo "<td>" . $row['VoorraadKg'] . "</td>";
            echo "<td>" . $row['PrijsPerKg'] . "</td>";
            echo '<td>' . "<a href='../pages/edit_onderdeel.php?onderdeelID=$row[ID]'><button type='button' class='btn btn-dark'>edit</button></a>" . '</td>';
            echo '<td>' . "<a href='../classes/delete.class.php?onderdeelID=$row[ID]'><button type='button' class='btn btn-dark'>delete</button></a>" . '</td>';
            echo "</tr>";
        }
    }

    public function getMedewerkers()
    {
        $sql = "SELECT rollen.Naam AS rol, medewerkers.Naam, medewerkers.Wachtwoord, medewerkers.Emailadres, medewerkers.ID AS MID FROM medewerkers INNER JOIN rollen ON medewerkers.RollID=rollen.ID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['Naam'] . "</td>";
            echo "<td>" . $row['Wachtwoord'] . "</td>";
            echo "<td>" . $row['Emailadres'] . "</td>";
            echo "<td>" . $row['rol'] . "</td>";
            echo '<td>' . "<a href='../pages/edit_medewerker.php?medewerkerID=$row[MID]'><button type='button' class='btn btn-dark'>edit</button></a>" . '</td>';
            echo '<td>' . "<a href='../classes/delete.class.php?medewerkerID=$row[MID]'><button type='button' class='btn btn-dark'>delete</button></a>" . '</td>';
            echo "</tr>";
        }
    }

    public function getApparaten()
    {
        $sql = "SELECT * FROM apparaten";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['Naam'] . "</td>";
            echo "</a>";    
            echo "<td>" . $row['Omschrijving'] . "</td>";
            echo "<td>" . $row['Vergoeding'] . "</td>";
            echo "<td>" . $row['GewichtGram'] . "</td>";
            echo '<td>' . "<a href='../pages/edit_apparaat.php?apparaatID=$row[ID]'><button type='button' class='btn btn-dark'>edit</button></a>" . '</td>';
            echo '<td>' . "<a href='../classes/delete.class.php?apparaatID=$row[ID]'><button type='button' class='btn btn-dark'>delete</button></a>" . '</td>';
            echo '<td>' . "<a href='../pages/apparaat_details.php?apparaatID=$row[ID]'><button type='button' class='btn btn-info'>Demonteren</button></a>" . '</td>';
            echo "</tr>";
        }
    }

    public function getOnderdeelApparaat($id)
    {
        $sql = "SELECT onderdelen.Naam AS naam, onderdeelapparaat.Percentage AS percentage, onderdeelapparaat.ApparaatID, onderdeelapparaat.ID FROM onderdeelapparaat INNER JOIN onderdelen ON onderdeelapparaat.OnderdeelID=onderdelen.ID WHERE ApparaatID = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['naam'] . "</td>";  
            echo "<td>" . $row['percentage'] . "</td>";
            echo '<td>' . "<a href='../classes/delete.class.php?onderdeelapparaatID=$row[ID]'><button type='button' class='btn btn-dark'>delete</button></a>" . '</td>';
            echo "</tr>";
        }
    }

    public function getInnames()
    {
        $sql = "SELECT innameapparaat.ID, innameapparaat.InnameID, innameapparaat.ApparaatID, innameapparaat.Ontleed, Innames.MedewerkerID, innames.Tijdstip, apparaten.Naam AS Anaam, apparaten.Vergoeding FROM innameapparaat INNER JOIN innames ON innameapparaat.InnameID=innames.ID
         INNER JOIN apparaten ON innameapparaat.ApparaatID=apparaten.ID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['MedewerkerID'] . "</td>";  
            echo "<td>" . $row['Tijdstip'] . "</td>";
            echo "<td>" . $row['Anaam'] . "</td>";
            echo "<td>" . $row['Vergoeding'] . "</td>";
            echo '<td>' . "<a href='../classes/delete.class.php?innameapparaatID=$row[ID]'><button type='button' class='btn btn-dark'>delete</button></a>" . '</td>';
            echo "</tr>";
        }
    }

    public function getNietGedemonteerdeApparaten()
    {
        $sql = "SELECT innameapparaat.ID, innameapparaat.InnameID, innameapparaat.ApparaatID, innameapparaat.Ontleed, apparaten.Naam, apparaten.Omschrijving FROM innameapparaat INNER JOIN 
        apparaten ON innameapparaat.ApparaatID = apparaten.ID WHERE Ontleed = 2";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['Ontleed'] == 2){
                $x = 'Niet Gedemonteerd';
            }
            echo "<tr>";
            echo "<td>" . $row['Naam'] . "</td>";  
            echo "<td>" . $row['Omschrijving'] . "</td>";
            echo "<td>" . $x . "</td>";
            echo "<tr>";
        }
    }

    public function getApparaat($id)
    {
        $sql = "SELECT * FROM apparaten WHERE ID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['Naam'] . "</td>";
            echo "</a>";    
            echo "<td>" . $row['Omschrijving'] . "</td>";
            echo "<td>" . $row['Vergoeding'] . "</td>";
            echo "</tr>";
        }
    }

    public function getInnameBon($id)
    {
        $sql = "SELECT apparaten.Naam as naam, apparaten.GewichtGram ,innames.Tijdstip FROM innameapparaat INNER JOIN innames ON innameapparaat.InnameID=innames.ID INNER JOIN apparaten ON innameapparaat.ApparaatID=apparaten.ID WHERE MedewerkerID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['naam'] . "</td>";
            echo "</a>";    
            echo "<td>" . $row['GewichtGram'] . "</td>";
            echo "<td>" . $row['Tijdstip'] . "</td>";
            echo "</tr>";
        }
    }
}





?>