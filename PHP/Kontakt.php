<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iseseisevtöö</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <div class="row justify-content-center my-5">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm p-5 rounded-4 bg-white">
            <h3 class="fw-bold mb-4 text-center">Hinna arvutamine</h3>
            </div>
    </div>
</div>
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
    <div class="row mt-4">
    <div class="col-md-6">
        <h2>Võta meiega ühendust</h2>
        <form>
            <div class="mb-3">
                <label for="nimi" class="form-label">Nimi</label>
                <input type="text" class="form-control" id="nimi">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-post</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="sonum" class="form-label">Sõnum</label>
                <textarea class="form-control" id="sonum" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Saada</button>
        </form>
    </div>
    <div class="col-md-6">
        <h2>Meie asukoht</h2>
        <div class="ratio ratio-1x1" style="height: 400px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2039.2964923481236!2d23.5518105159048!3d58.919420881804246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46ed6494e89791cb%3A0xc6a827038e8331bb!2sHaapsalu%20Kutsehariduskeskus!5e0!3m2!1set!2see!4v1680000000000!5m2!1set!2see" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>