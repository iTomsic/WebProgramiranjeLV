<?php

include_once 'spoj.php';

session_start();
if ($_SESSION['ime'] == NULL) {
    echo 'neispravna sesija';
    header("location: index.php");
}
if ($_SESSION['uloga'] == 'admin') {
    $ime = $_SESSION['ime'];
    $prezime = $_SESSION['prezime'];
    echo "<h1>Dobro došli $ime $prezime !</h1>";
} else
    header("location:index.php");

?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Dodaj Proizvod</title>
</head>

<body>

    <div class="col col-6">
        <div>
            <ul class="list-group">
                <li class="list-group-item"><a href="ispis.php">Ispis</a></li>
                <li class="list-group-item"><a href="obrisi_proizvod.php">Brisanje</a></li>
                <li class="list-group-item"><a href="update_proizvod.php">Promjena</a></li>
                <li class="list-group-item"><a href="odjava.php">Odjava</a></li>
            </ul>
        </div>


        <form action="unos.php" method="post">
            <label class="form-label" for="nazivProizvod">Ime proizvoda</label>
            <input class="form-control" type="text" name="nazivProizvod" id="nazivProizvod"><br>
            <label class="form-label" for="opis">Opis proizvoda</label>
            <input class="form-control" type="text" name="opis" id="opis"><br>
            <label class="form-label" for="kolicina">Kolicina proizvoda</label>
            <input class="form-control" type="number" name="kolicina" id="kolicina"><br>
            <label class="form-label" for="cijena">Cijena proizvoda</label>
            <input class="form-control" type="text" name="cijena" id="cijena">
            <input class="btn btn-info" type="submit" value="Dodaj!">
        </form>
    </div>
</body>

</html>