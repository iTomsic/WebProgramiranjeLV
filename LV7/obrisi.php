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

    if (isset($_POST['nazivProizvod'])) {
 
        $nazivProizvod = $_POST['nazivProizvod'];

        // UZIMAMO POLJA IZ FORMA I BRISEMO PO ID-U IZ BAZE 
        $sql = "DELETE FROM proizvodi WHERE nazivProizvod = '$nazivProizvod'";

        if ($conn->query($sql)) {
            //ostajemo na stranici istoj
            header("location: obrisi.php");
        } else {
            echo "Error: " . $sql . ": -" . $conn->error();
        }

        $conn->close();

    }
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
        <li class="list-group-item"><a href="obrisi_proizvod.php">Obrisi proizvod</a></li>
        <li class="list-group-item"><a href="update_proizvod.php">Promijeni proizvod</a></li>
        <li class="list-group-item"><a href="odjava.php">Odjava</a></li>
    </ul>
</body>

</html>