<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iseseisevtöö</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Something</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Avaleht</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Tooted.php">Tooted</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Kontakt.php">Kontaktid</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Kalkulaator.php">Kalkulaator</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Ostukorv.php">Ostukorv</a>
            </li>
        </div>
      </div>
    </nav>
    <div class="mt-4">
    <h2>Kalkulaator</h2>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hind = floatval($_POST['hind']);
        $kogus = intval($_POST['kogus']);
        $soodustus = isset($_POST['soodustus']) ? 0.95 : 1; // -5% kui on märgitud
        
        $kokku = ($hind * $kogus) * $soodustus;
        
        // Salvestamine orders.txt faili
        $tekst = date("Y-m-d H:i:s") . " | Hind: $hind € | Kogus: $kogus | Soodustus: " . (isset($_POST['soodustus']) ? "Jah (-5%)" : "Ei") . " | Summa: $kokku €\n";
        file_put_contents("orders.txt", $tekst, FILE_APPEND);
        
        echo "<div class='alert alert-success'>Tellimus edukalt salvestatud! Lõplik summa: <strong>" . number_format($kokku, 2) . " €</strong></div>";
    }
    ?>

    <form method="post" action="">
        <div class="mb-3">
            <label for="hind" class="form-label">Toote hind (€)</label>
            <input type="number" step="0.01" class="form-control" id="hind" name="hind" required>
        </div>
        <div class="mb-3">
            <label for="kogus" class="form-label">Kogus</label>
            <input type="number" class="form-control" id="kogus" name="kogus" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="soodustus" name="soodustus">
            <label class="form-check-label" for="soodustus">Blogi kampaania soodustus (-5%)</label>
        </div>
        <button type="submit" class="btn btn-primary">Arvuta ja salvesta</button>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>