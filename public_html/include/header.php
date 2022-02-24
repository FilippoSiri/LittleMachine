<header class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top coloreSito">
        <a href="<?php echo $root ?>/index.php" class="navbar-brand"><img src="<?php echo $root ?>/img/logo.png" alt="Logo" style="max-height: 50px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php echo isset($home) ? 'active' : '' ?>">
                    <a href="<?php echo $root ?>/index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item <?php echo isset($donation) ? 'active' : '' ?>">
                    <a href="<?php echo $root ?>/pages/donation.php" class="nav-link">Donazioni</a>
                </li>
                <li class="nav-item <?php echo isset($search) ? 'active' : '' ?>">
                    <a href="<?php echo $root ?>/pages/search.php" class="nav-link">Prodotti</a>
                </li>
                <?php
                    if(isset($_SESSION['idU']))
                        include_once 'header_loggato.php';
                    else
                        include_once 'header_nologgato.php';
                ?>
                
            </ul>
            <form class="form-inline my-2 my-lg-0" id="search-form">
                <?php
                $activeC = isset($cart) ? 'active' : '';
                $activeO = isset($order) ? 'active' : '';
                if(isset($_SESSION['idU'])) {
                    echo '<a href="'.$root.'/pages/order.php" class="nav-link '.$activeO.'" id="order-icon"><i class="fa fa-clipboard-list"></i></a>';
                    echo '<a href="'.$root.'/pages/cart.php" class="nav-link '.$activeC.'" id="cart-icon" style="margin-right:5px"><i class="fas fa-cart-arrow-down"></i></a>';
                }
                ?>
                <input class="form-control mr-sm-2" id="search-input" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
    </nav>
    <div >
        <div class=" navbar-dark bg-dark fixed-top coloreSito" style="margin-top:77px" id="categorie">
            <div class="nav-item spazioSinistra testoCategoria" style="float:left"><a href="<?php echo $root;?>/pages/search.php?search=sportive" class="testoCategoria">Sportive</a></div>
            <div class="nav-item spazioSinistra testoCategoria" style="float:left"><a href="<?php echo $root;?>/pages/search.php?search=lusso" class="testoCategoria">Lusso</a></div>
            <div class="nav-item spazioSinistra testoCategoria" style="float:left"><a href="<?php echo $root;?>/pages/search.php?search=fuoristrada" class="testoCategoria">Fuoristrada</a></div>
            <div class="nav-item spazioSinistra testoCategoria" style="float:left"><a href="<?php echo $root;?>/pages/search.php?search=utilitaria" class="testoCategoria">Utilitarie</a></div>
            <div class="nav-item spazioSinistra testoCategoria" style="float:left"><a href="<?php echo $root;?>/pages/search.php?search=epoca" class="testoCategoria">Epoca</a></div>
        </div>
    </div>
</header>