<?php

include "spoj.php";
session_start();

// kada redirectamo sa prijavi ili registriraj korisnik ima ime i tako provjerimo

$conn = new DatabaseConnection;
$conn->connect();

$sql = "SELECT * FROM proizvodi";
$resultAll = $conn->query($sql);

if (!$resultAll) {
    die($conn->error());
}

if ($conn->getCount($resultAll) > 0) {

    // prikazujemo proizvode na stranici u obliku tablice sa 6 stupaca i 4 reda
    echo "<div class=\"col col-6\">";
    echo "<table class=\"table\">";

    while ($row = $conn->getArray($resultAll)) {
        echo "<tr>";
        echo "<td>" . $row['nazivProizvod'] . "</td>";
        echo "<td>" . $row['opis'] . "</td>";
        echo "<td>" . $row['kolicina'] . "</td>";
        echo "<td>" . $row['cijena'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
}

?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Ispis Proizvoda</title>
</head>

<body>
    <ul>
        
        <?php if ($_SESSION['uloga'] == 'admin') {
            echo
                "<li><a href='dodaj_proizvod.php'>Dodaj proizvod</a></li>",
                "<li><a href='obrisi_proizvod.php'>Obrisi proizvod</a></li>",
                "<li><a href='update_proizvod.php'>Promijeni proizvod</a></li>";
                
        } ?>

        <li><a href="odjava.php">Odjava</a></li>
    </ul>
</body>

</html>