<?php

include_once "spoj.php";

session_start();
if ($_SESSION['ime'] == NULL) {
    echo 'neispravna sesija';
    header("location: index.php");
}
if ($_SESSION['uloga'] == 'admin') {

    $conn = new DatabaseConnection;
    $conn->connect();

    if (isset($_POST['naziv_stari']) && isset($_POST['naziv_novi'])) {

    $naziv_stari = $_POST['naziv_stari'];
    $naziv_novi = $_POST['naziv_novi'];
    $opis = $_POST['opis'];
    $kolicina = $_POST['kolicina'];
    $cijena = $_POST['cijena'];

    
    $sql = "UPDATE proizvodi 
            SET nazivProizvod = '$naziv_novi',
                opis = '$opis',
                kolicina = '$kolicina',
                cijena = '$cijena'
            WHERE nazivProizvod = '$naziv_stari'";

    if ($conn->query($sql)) {
        header("location: ispis.php");
        exit();
    } else {
        echo "Error: " . $sql . " - " . $conn->error();
    }

    $conn->close();
}
        echo "<h2>Unos uspiješan</h2>";
    } else
    header("location:index.php");
?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Unos proizvoda</title>
</head>

<body>
    <ul class="list-group">
        <li class="list-group-item"><a href="ispis.php">Ispis</a></li>
        <li class="list-group-item"><a href="dodaj_proizvod.php">Dodaj proizvod</a></li>
        <li class="list-group-item"><a href="odjava.php">Odjava</a></li>
    </ul>
</body>

</html>