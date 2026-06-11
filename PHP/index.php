<?php
session_start();
$kataloog = 'img';
$pildid = glob($kataloog . "/*.{jpg,jpeg,png,gif}", GLOB_BRACE);

// Vaikimisi pildid, kui kaust on tühi
$pilt1 = $pilt2 = $pilt3 = "https://images.unsplash.com/photo-1513519245088-0e12902e5a38?q=80&w=1200&auto=format&fit=crop";

if (!empty($pildid) && count($pildid) >= 3) {
    $suvalised_votmed = array_rand($pildid, 3);
    $pilt1 = $pildid[$suvalised_votmed[0]];
    $pilt2 = $pildid[$suvalised_votmed[1]];
    $pilt3 = $pildid[$suvalised_votmed[2]];
}
?>
<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Käsitööpood — Avaleht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; bg-color: #f8f9fa; }
        .navbar { border-bottom: 1px solid rgba(0,0,0,0.05); }
        /* Bänneri piltide stiil, et nad oleks alati ideaalses mõõdus */
        .carousel-item img {
            height: 500px;
            object-fit: cover;
            filter: brightness(65%); /* Teeb pildi tumedamaks, et tekst paistaks silma */
        }
        .carousel-caption {
            bottom: 35%;
            z-index: 10;
        }
        .feature-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 0.75rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: var(--bs-primary-rgb);
            color: white;
        }
    </style>
</head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm py-3">
      <div class="container">
        <a class="navbar-brand fw-bold text-uppercase tracking-wider" href="index.php">✨ midagi head</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
            <li class="nav-item"><a class="nav-link active fw-semibold" href="index.php">Avaleht</a></li>
            <li class="nav-item"><a class="nav-link" href="tooted.php">Tooted</a></li>
            <li class="nav-item"><a class="nav-link" href="Kontakt.php">Kontaktid</a></li>
            <li class="nav-item"><a class="nav-link" href="Kalkulaator.php">Kalkulaator</a></li>
            <li class="nav-item"><a class="nav-link btn btn-primary text-white px-3 shadow-sm" href="Ostukorv.php">Ostukorv 🛒</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo $pilt1; ?>" class="d-block w-100" alt="Bänner 1">
                <div class="carousel-content container">
                    <div class="carousel-caption text-start">
                        <h1 class="display-3 fw-bold">Ehtne Eesti käsitöö</h1>
                        <p class="lead col-lg-6">Avasta unikaalsed tooted, mis on loodud hoole ja armastusega otse kohalike meistrite poolt.</p>
                        <a href="tooted.php" class="btn btn-primary btn-lg px-4 py-3 mt-2 shadow">Tutvu toodetega</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo $pilt2; ?>" class="d-block w-100" alt="Bänner 2">
                <div class="carousel-caption">
                    <h1 class="display-3 fw-bold">Kvaliteet igas detailis</h1>
                    <p class="lead">Kasutame ainult parimaid materjale ja traditsioonilisi töövõtteid.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo $pilt3; ?>" class="d-block w-100" alt="Bänner 3">
                <div class="carousel-caption text-end">
                    <h1 class="display-3 fw-bold">Parimad pakkumised blogis</h1>
                    <p class="lead">Kasuta kalkulaatorit ja saa osa meie salajastest sooduskoodidest!</p>
                    <a href="Kalkulaator.php" class="btn btn-outline-light btn-lg px-4 py-3 mt-2">Arvuta soodustus</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Eelmised</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Järgmised</span>
        </button>
    </div>

    <div class="container my-5 py-4">
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card border-0 bg-white p-4 h-100 shadow-sm rounded-4">
                    <div class="text-primary mb-3 fs-2">📦</div>
                    <h4 class="fw-bold">Kiire tarne</h4>
                    <p class="text-muted mb-0">Saadame kauba teele 24 tunni jooksul üle terve Eesti.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 bg-white p-4 h-100 shadow-sm rounded-4">
                    <div class="text-primary mb-3 fs-2">🌱</div>
                    <h4 class="fw-bold">100% Looduslik</h4>
                    <p class="text-muted mb-0">Hoolime keskkonnast. Meie materjalid on puhtad ja jätkusuutlikud.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 bg-white p-4 h-100 shadow-sm rounded-4">
                    <div class="text-primary mb-3 fs-2">❤️</div>
                    <h4 class="fw-bold">Klienditugi</h4>
                    <p class="text-muted mb-0">Meie tiim on alati valmis sind aitama ja küsimustele vastama.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>