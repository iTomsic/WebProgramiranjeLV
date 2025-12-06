<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Update proizvod</title>
</head>

<body>

<div class="col col-6">

    <form action="update.php" method="post">

        <label class="form-label" for="naziv_stari">Naziv proizvoda za izmjenu</label>
        <input class="form-control" type="text" name="naziv_stari" id="naziv_stari"><br>

        <h4>Nove vrijednosti:</h4>

        <label class="form-label" for="naziv_novi">Novi naziv proizvoda</label>
        <input class="form-control" type="text" name="naziv_novi" id="naziv_novi"><br>

        <label class="form-label" for="opis">Opis proizvoda</label>
        <input class="form-control" type="text" name="opis" id="opis"><br>

        <label class="form-label" for="kolicina">Kolicina proizvoda</label>
        <input class="form-control" type="number" name="kolicina" id="kolicina"><br>

        <label class="form-label" for="cijena">Cijena proizvoda</label>
        <input class="form-control" type="text" name="cijena" id="cijena"><br>

        <input class="btn btn-info" type="submit" value="Update proizvod!">
    </form>

</div>

</body>
</html>
