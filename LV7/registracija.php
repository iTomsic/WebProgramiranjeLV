<?php

require_once "spoj.php";

if (isset($_POST['e_mail'])) {

    unset($error);

    $conn = new DatabaseConnection;
    $conn->connect();

    $sql = 'SELECT * FROM korisnici WHERE ime = "' . $e_mail . '"';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $error = "Korisničko ime zauzeto!<br>";

    } else {
        // ako username polje postoji u Post requestu
        if (isset($_POST['e_mail'])) {

            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $e_mail = $_POST['e_mail'];
            $password = $_POST['password'];
            //spremimo korisnika u bazu
            $sql = "INSERT INTO korisnici (ime,prezime,e_mail,lozinka,uloga) VALUES('$ime','$prezime','$e_mail','$password','korisnik')";

            // ako je query uspješan redirectamo ga na ispis.php
            if ($conn->query($sql)) {
                header("location: ispis.php");
            } else {
                //ispišemo query i poruku exceptiona
                echo "Error: " . $sql . ": -" . $conn->error();
            }

            $conn->close();
            echo "<h2>Unos uspiješan</h2>";
        }
    }
}
?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Registracija</title>
</head>

<body>
    <div class="col col-6">
        <form action="" method="post">
            <label class="form-label" for="ime">Ime</label>
            <input class="form-control" type="text" name="ime" id="ime"><br>

            <label class="form-label" for="prezime">Prezime</label>
            <input class="form-control" type="text" name="prezime" id="prezime"><br>

            <label class="form-label" for="email">E-mail</label>
            <input class="form-control" type="email" name="e_mail" id="e_mail"><br>

            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password"><br>

            <label class="form-label" for="password2">Potvrdi password</label>
            <input class="form-control" type="password" name="password2" id="password2"><br>

            <input class="btn btn-info" type="submit" value="Predaj">
        </form>
    </div>
    <p><a href="index.php">Vrati se na pocetak</a></p>
</body>

</html>
