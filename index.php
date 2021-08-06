<!doctype html>
<html lang="de">
<?php
spl_autoload_register(function ($className) {
    error_log('autoloader:' . $className);
    include 'classes/' . $className . '.php';
});
Head::printHead("School Exchange", "/css/styleindex.css");
?>


<body>
<?php
Navbar::printNavbarIndex("home");
?>
<div class="container">

    <h1 class="headline">Willkommen auf School Exchange</h1>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/pic/werbung1.png" class="d-block w-100" alt="werbung school exchange">
                <div class="carousel-caption d-none d-md-block">

                </div>
            </div>
            <div class="carousel-item">
                <img src="/pic/werbung2.png" class="d-block w-100" alt="werbung school exchange">
                <div class="carousel-caption d-none d-md-block">

                </div>
            </div>
            <div class="carousel-item">
                <img src="/pic/werbung3.png" class="d-block w-100" alt="werbung school exchange">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="/pic/werbung4.png" class="d-block w-100" alt="werbung school exchange">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="row">
        <div class="col"><h3 class="headline2">News:</h3></div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card" id="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">Neue Features kommen bald!</h5>
                    <h6 class="card-subtitle mb-2 text-muted">v.0.1</h6>
                    <p class="card-text">In nächster Zeit werden neue Features kommen wie zb.: eine funktionierende Datenbank und Lerngruppen(aka Klassen)</p>
                    <a href="progress.php" class="card-link">zum Fortschritt</a>
                </div>
            </div>
        </div>

    </div>
</div>


</body>
</html>
