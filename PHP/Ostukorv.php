<?php
session_start();

// Ostukorvi tühjendamine
if (isset($_GET['tyhjenda'])) {
    unset($_SESSION['ostukorv']);
    header("Location: Ostukorv.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ostukorv</title>
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
            <li class="nav-item"><a class="nav-link" href="tooted.php">Tooted</a></li>
            <li class="nav-item"><a class="nav-link" href="Kontakt.php">Kontaktid</a></li>
            <li class="nav-item"><a class="nav-link" href="Kalkulaator.php">Kalkulaator</a></li>
            <li class="nav-item"><a class="nav-link active" href="Ostukorv.php">Ostukorv</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="mt-4">
        <h2>Sinu ostukorv</h2>

        <?php if (!isset($_SESSION['ostukorv']) || empty($_SESSION['ostukorv'])): ?>
            <div class="alert alert-info">Sinu ostukorv on hetkel tühi.</div>
            <a href="tooted.php" class="btn btn-primary">Mine tooteid valima</a>
        <?php else: ?>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Toote nimi</th>
                        <th>Hind</th>
                        <th>Kogus</th>
                        <th>Summa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $kogu_summa = 0;
                    foreach ($_SESSION['ostukorv'] as $nimi => $andmed) {
                        $rea_summa = $andmed['hind'] * $andmed['kogus'];
                        $kogu_summa += $rea_summa;
                        echo "<tr>";
                        echo "  <td>" . htmlspecialchars($nimi) . "</td>";
                        echo "  <td>" . number_format($andmed['hind'], 2) . " €</td>";
                        echo "  <td>" . $andmed['kogus'] . "</td>";
                        echo "  <td>" . number_format($rea_summa, 2) . " €</td>";
                        echo "</tr>";
                    }
                    ?>
                    <tr class="fw-bold">
                        <td colspan="3" class="text-end">Kokku tasuda:</td>
                        <td><?php echo number_format($kogu_summa, 2); ?> €</td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-4">
                <a href="Ostukorv.php?tyhjenda=1" class="btn btn-danger">Tühjenda ostukorv</a>
                <button class="btn btn-success" onclick="alert('Aitäh tellimuse eest! (See on näidisvorm)')">Vormista ost</button>
            </div>
        <?php endif; ?>
    </div>
    </div>
  </body>
</html>