<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Obrisi proizvod</title>
</head>

<body>

    <div class="col col-6">

        <form action="obrisi.php" method="post">
            <label class="form-label" for="nazivProizvod">Naziv proizvoda</label>
            <input class="form-control" type="text" name="nazivProizvod" id="nazivProizvod"><br>
            <input class="btn btn-danger" type="submit" value="Obrisi!">
        </form>

    </div>
</body>

</html>