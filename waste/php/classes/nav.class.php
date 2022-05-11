<?php 

class Nav extends Dbh
{
    public function Navbar($id)
    {
        $sql = "SELECT RollID FROM medewerkers WHERE ID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['RollID'] == 001) {
                echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Superior Waste</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="inname.php">Inname</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Verwerking</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="uitgifte.php">Uitgifte</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Rapportage
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">Ingenomen Apparaten</a>
                        <a class="dropdown-item" href="niet_gedemonteerde_apparaten.php">niet gedemonteerde apparaten</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Verkochte Onderdelen</a>
                        <a class="dropdown-item" href="rendement.php">Rendement</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Onderhoud
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="apparaten.php">Apparaten</a>
                        <a class="dropdown-item" href="onderdelen.php">Onderdelen</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Innames</a>
                        <a class="dropdown-item" href="#">Uitgiftes</a>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="medewerkers.php">Medewerkers</a>
                    </li>
                  </ul>
                </div>
              </nav>';
            } elseif($row['RollID'] == 002) {
                echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Superior Waste</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="inname.php">Inname</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Rapportage
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">Ingenomen Apparaten</a>
                        <a class="dropdown-item" href="niet_gedemonteerde_apparaten.php">niet gedemonteerde apparaten</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Verkochte Onderdelen</a>
                        <a class="dropdown-item" href="rendement.php">Rendement</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Onderhoud
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">Apparaten</a>
                        <a class="dropdown-item" href="">Onderdelen</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Innames</a>
                        <a class="dropdown-item" href="#">Uitgiftes</a>
                      </div>
                    </li>
                  </ul>
                </div>
              </nav>';
            } elseif($row['RollID'] == 003) {
                echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Superior Waste</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Verwerking</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="uitgifte.php">Uitgifte</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Rapportage
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">Ingenomen Apparaten</a>
                        <a class="dropdown-item" href="niet_gedemonteerde_apparaten.php">niet gedemonteerde apparaten</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Verkochte Onderdelen</a>
                        <a class="dropdown-item" href="rendement.php">Rendement</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Onderhoud
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="apparaten.php">Apparaten</a>
                        <a class="dropdown-item" href="onderdelen.php">Onderdelen</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Innames</a>
                        <a class="dropdown-item" href="#">Uitgiftes</a>
                      </div>
                    </li>
                  </ul>
                </div>
              </nav>';
            } elseif($row['RollID'] == 004) {
                echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Superior Waste</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Rapportage
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">Ingenomen Apparaten</a>
                        <a class="dropdown-item" href="niet_gedemonteerde_apparaten.php">niet gedemonteerde apparaten</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Verkochte Onderdelen</a>
                        <a class="dropdown-item" href="rendement.php">Rendement</a>
                      </div>
                    </li>
                  </ul>
                </div>
              </nav>';
            }
        }
    }
}




?>