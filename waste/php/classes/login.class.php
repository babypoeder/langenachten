<?php 
require("dbh.class.php");

class Login extends Dbh
{
    public function checkLogin($username, $password)
    {
        $sql = "SELECT * FROM medewerkers WHERE Naam = ? AND Wachtwoord = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt -> execute([$username, $password]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if ($count > 0) {
            $_SESSION['username'] = $row['Naam'];
            $_SESSION['id'] = $row['ID'];
            header("location: index.php");
        } else {
            echo "<label>Username or password is incorrect</label>";
        }
    }
}


if (isset($_POST['login'])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo "<label>All fields are required!</label>";
    } else {
        $login = new Login();
        $login -> checkLogin($_POST['username'], $_POST["password"]);
    }
}




?>