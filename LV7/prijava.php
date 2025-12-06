<?php

include "spoj.php";
session_start(); // započnemo sesiju

if ($_POST) { // ako je request POST 
    //provjeravamo jel JSON request sadržava e_mail i password
    if (isset($_POST['e_mail']) && isset($_POST['password'])) {
        $conn = new DatabaseConnection;
        $conn->connect();

        $myemail = mysqli_real_escape_string($conn->getConnection(), $_POST['e_mail']);
        $mypassword = mysqli_real_escape_string($conn->getConnection(), $_POST['password']);

        // tražimo korisnika u bazi
        $sql = "SELECT id from korisnici WHERE e_mail = '$myemail' and lozinka = '$mypassword'";

        $result = $conn->query($sql);
        $row = $conn->getArray($result); // vrača id korisnika
        $count = $conn->getCount($result); // broj redaka koliko je vratio

        // id od korisnika
        $id = $row['id'];

        //sva polja korisnika 
        $sql2 = "SELECT * FROM korisnici WHERE id = '$id'";
        $resultAll = $conn->query($sql2);

        // ako query vrati exception, napiši message
        if (!$resultAll) {
            die($conn->error());
        }

        if ($conn->getCount($resultAll) > 0) {
            $rowData = $conn->getArray($resultAll);
        }

        //ako postoji korisnik
        if ($count == 1) {
            //pohranimo podatke korisnika u sesiju
            $_SESSION['username'] = $rowData['e_mail'];
            $_SESSION['ime'] = $rowData['ime'];
            $_SESSION['prezime'] = $rowData['prezime'];
            $_SESSION['uloga'] = $rowData['uloga'];

            //redirectamo korisnika s obzirom na ulogu
            if ($_SESSION['uloga'] == 'admin') {
                header("location: dodaj_proizvod.php");
                exit();
            } else {
                header("location: ispis.php");
                exit();
            }

        } else {
            $error = "Račun ne postoji, pokušajte ponovo";
        }
    } else {
        $error = "Vaše korisničko ime ili lozinka su netočni";
    }

    echo "<label class=\"text-danger\">$error</label>";
}
?>

<!DOCTYPE html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="wrapper">
        <h2>Prijava</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="e_mail" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Nisi registriran? <a href="registracija.php">Registriraj se ovdje</a>.</p>
        </form>
    </div>
</body>

</html>