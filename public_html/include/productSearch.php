<div class="row padding">
    <div class=" col-xs-2 col-sm-6 col-md-4">
        <div class="contenitoreImmagineCarrello">
            <img src="<?php echo $root.$product['imgPath'];?>" class="immaginePrincipale spazioSinistra" alt="<?php echo $product['imgDescription'];?>">
        </div>
    </div>

    <div class=" col-xs-10 col-sm-6 col-md-8">
        <h4 class="pro-d-title spazioSinistra">
            <a href="product.php?idP=<?php echo $product['idP'];?>" class="testoProdotto">
                <?php echo $product['name']; ?>
            </a>
        </h4>
        <div>
            <?php
                if($categoryRes -> num_rows > 0){
                    echo '<span class="posted_in spazioSinistra">';
                    echo '<strong>Categorie:</strong>';
                    $first = true;
                    while($cat = $categoryRes -> fetch_assoc()){
                        if(!$first)
                            echo ', ';
                        echo '<a rel="tag" href="search.php?search='.$cat['name'].'">'.$cat['name'].'</a>';
                        $first = false;
                    }
                    echo '.';
                }
            ?>
        </div>
        <div class="spazioSinistra">
            <strong>Prezzo Unitario: </strong>
            <span><?php echo $product['price']/100.0 ?>&euro;</span>
        </div>
        <form class="form-group spazioSinistra infoProduct" id="<?php echo $product['idP'];?>" >
            <input hidden type="number" min="0" value="<?php echo $qta;?>" class="form-control quantity" id="qta<?php echo $product['idP'];?>">
            <?php
                if(isset($_SESSION['idU']))
                    echo '<input type="text" hidden id="tokenCSRF'.$product['idP'].'" value='.$_SESSION['tokenCSRF'].'>';
            ?>
            <?php
                if($product['qta'])
                    echo '
                        <button class="btn btn-round bottoneCarrello" style="float:left;margin:10px;" type="submit" id="button'.$product['idP'].'" >
                            <i class="fa fa-shopping-cart"></i> Aggiungi al carrello
                        </button>
                        <div hidden class="testoErrore" id="prodottoEsaurito'.$product['idP'].'" >  <i class="fas fa-exclamation-circle"></i>Prodotto esaurito</div>
                        <div hidden class="testoErrore" id="ultimoProdotto'.$product['idP'].'" >  <i class="fas fa-exclamation-circle"></i>Non puoi aggiungere altri prodotti al carrello</div>
                    ';
                else
                    echo '
                        <div  class="testoErrore" >  <i class="fas fa-exclamation-circle"></i> Prodotto non presente in magazzino</div>
                    ';
            ?>

        </form>
    </div>

</div>