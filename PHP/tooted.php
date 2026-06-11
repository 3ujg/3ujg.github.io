<?php
session_start(); // Käivitame sessiooni, et ostukorv toimiks

// Kontrollime, kas vajutati "Lisa ostukorvi" nuppu
if (isset($_GET['lisa'])) {
    $toote_nimi = $_GET['lisa'];
    $toote_hind = floatval($_GET['hind']);

    if (!isset($_SESSION['ostukorv'])) {
        $_SESSION['ostukorv'] = [];
    }

    // Kui toode on juba korvis, suurendame kogust, muidu lisame uue
    if (isset($_SESSION['ostukorv'][$toote_nimi])) {
        $_SESSION['ostukorv'][$toote_nimi]['kogus']++;
    } else {
        $_SESSION['ostukorv'][$toote_nimi] = [
            'hind' => $toote_hind,
            'kogus' => 1
        ];
    }

    // Suuname tagasi toodete lehele, et URL jääks puhas
    header("Location: tooted.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tooted</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
  <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Something</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="index.php">Avaleht</a></li>
            <li class="nav-item"><a class="nav-link active" href="tooted.php">Tooted</a></li>
            <li class="nav-item"><a class="nav-link" href="Kontakt.php">Kontaktid</a></li>
            <li class="nav-item"><a class="nav-link" href="Kalkulaator.php">Kalkulaator</a></li>
            <li class="nav-item"><a class="nav-link" href="Ostukorv.php">Ostukorv</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <h2 class="mt-4 mb-4">Tooted</h2>
    <div class="row">
    <?php
    $file = fopen("crafts.csv", "r");
    $first_line = true;
    $loend = 0;
    
    while (($rida = fgetcsv($file)) !== FALSE && $loend < 12) {
        if ($first_line) {
            $first_line = false;
            continue;
        }
        
        $name = htmlspecialchars($rida[0]);
        $price = number_format((float)$rida[1], 2);
        $desc = htmlspecialchars($rida[2]);

        echo '<div class="col-md-3 mb-4">';
        echo '  <div class="card h-100">';
        echo '    <img src="pildid/toode.jpg" class="card-img-top" alt="Toote pilt">';
        echo '    <div class="card-body d-flex flex-column">';
        echo '      <h5 class="card-title">' . $name . '</h5>';
        echo '      <p class="card-text flex-grow-1">' . $desc . '</p>';
        echo '      <p class="card-text fw-bold">' . $price . ' €</p>';
        // MUUDETUD: Nupp saadab nüüd andmed GET päringuga lehe algusesse
        echo '      <a href="tooted.php?lisa=' . urlencode($name) . '&hind=' . $rida[1] . '" class="btn btn-primary mt-auto">Lisa ostukorvi</a>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';

        $loend++;
    }
    fclose($file);
    ?>
    </div>
    </div>
  </body>
</html>