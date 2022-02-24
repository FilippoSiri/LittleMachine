<!DOCTYPE html>
<?php
    session_start();
    $home = false;
    $root = ".";
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Little Machines</title>
        <?php require_once "include/library.php"; ?>
        <link href="css/common.css" rel="stylesheet">
        <link href="css/form.css" rel="stylesheet">
    </head>
    <body>

    <!-- Header -->
    <?php
        require_once "include/header.php";
    ?>

        <!--- Slider Immagini -->
        <div id="slides" class="carousel slide d-none d-md-block d-lg-block d-xl-block" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#slides" data-slide-to="0" class="active"></li>
                <li data-target="#slides" data-slide-to="1"></li>
                <li data-target="#slides" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="pages/search.php?search=ferrari">
                        <img src="img/background.png" style="width:100%;max-height: 75vh;">
                        <div class="carousel-caption">
                            <h1 class="display2">Modellini Ferrari</h1>
                        </div>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="pages/search.php?search=mercedes">
                        <img src="img/background2.png" style="width:100%;max-height: 75vh;">
                        <div class="carousel-caption">
                            <h1 class="display2">Modellini Mercedes</h1>
                        </div>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="pages/search.php?search=">
                        <img src="img/background3.png" style="width:100%;max-height: 75vh;">
                        <div class="carousel-caption">
                            <h1 class="display2">Collezione modellini</h1>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!--- Introduzione Sito -->
        <div class="container-fluid padding">
            <div class="row welcome text-center">
                <div class="col-12">
                    <h1 class="display-4">Modellini realizzati con estrema cura per voi.</h1>
                </div>
                <hr class="my-3">
                <div class="col-12">
                    <p class="lead">
                        Benvenuti nel nostro e-shop. Questo e-shop è specializzato nella vendita di modellini di automobili a cui noi siamo affezionati, e siamo convinti che voi che siete qua condividete il nostro stesso sentimento!
                    </p>
                </div>
            </div>
        </div>

        <!--- 3 colonne spiegazione -->
        <div class="container-fluid padding">
            <div class="row text-center welcome padding">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <!--i>spazioImmagine</i-->
                    <h3>Colorate</h3>
                    <p>Colorate con colori accuratissmi</p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <!--i>spazioImmagine</i-->
                    <h3>Dettagliatissime</h3>
                    <p>Modellate a mano per ottenere copie incredibili</p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <!--i>spazioImmagine</i-->
                    <h3>Unici</h3>
                    <p>Essendo fatte a mano, troverete passione in ogni prodotto</p>
                </div>

            </div>
            <div class="row welcome text-center">
                <hr class="my-3">
            </div>
        </div>

        <!--- 2 colonne spiegazione -->
        <div class="container-fluid padding">
            <div class="row padding">
                <div class="col-lg-8 spazioSinistra">
                    <h2>Costruite a mano per i nostri adorati clienti</h2>
                    <br>
                    <p>Il nostro team di modellatori per prima cosa si sono occupati di realizzare modelli 3D delle splendide vetture che son presenti nel catalogo.</p>
                    <p>Una volta avuta la base, aggiugniamo fino ai più piccoli dettagli. Tutto questo perché riteniamo fondamentale che i nostri modellini siano perfette riproduzioni delle vetture.</p>
                    <br>
                    <p>Dopo questa enorme fase, un altro team si occuperà della creazione delle replice dedicate alla vendita diretta per gli utenti.</p>
                    <p>Realizzarle a mano ci permette di mettere nei nostri prodotti la stessa passione che voi avete e che noi condividiamo.</p>
                    <br><br><br>
                    <p>Oltre alla vendita diretta dei prodotti già presenti in magazzino, abbiamo aggiunto una sezione crowdfunding!</p>
                    <p>Raggiungendo i nostri obiettivi prefissati, amplieremo il nostro catalogo con altri pezzi da collezione, di vetture bellissime da amare.</p>
                </div>
                <div class="col-lg-4 spazioSinistra" style="margin: auto;">
                    <img src="img/modellini.jpg" class="img-fluid" style="max-height: 40vh;"> <!--Da correggere e centralizzare l'immagine-->
                </div>
            </div>
        </div>

        <!--- Fixed background -->
        <figure>
            <div class="fixed-wrap">
                <div id="fixed"></div>
            </div>
        </figure>


        <!--- Incontra Il Team -->

        <div class="container-fluid padding" style="margin-top:70vh">
            <div class="row welcome text-center">
                <div class="col-12">
                    <h1 class="display-4">Incontra il team</h1>
                </div>
                <hr class="my-3">
            </div>
        </div>
        <div class="container-fluid padding">
            <div class="row padding">
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <div class="card" style="margin:auto">
                        <img src="img/products/default.jpeg" alt="immagine di default" class="card-img-top">
                        <div class="card-body" style="text-align: center">
                            <h4 class="card-title">Filippo</h4>
                            <p class="card-text">Text</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <div class="card" style="margin:auto">
                        <img src="img/products/default.jpeg" alt="immagine di default" class="card-img-top">
                        <div class="card-body" style="text-align: center">
                            <h4 class="card-title">Claudio</h4>
                            <p class="card-text">Text</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <!--- Footer -->
        <?php
            require_once "include/footer.php";
        ?>

    </body>
</html>




