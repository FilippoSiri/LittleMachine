<div id="div<?php echo $product['idP'];?>" class="row padding interoProdotto">
    <div class=" col-xs-2 col-sm-6 col-md-4">
        <div class="contenitoreImmagineCarrello">
            <img src="<?php echo $root.$product['imgPath']?>" class="immaginePrincipale spazioSinistra" alt="<?php echo $product['imgDescription']?>">
        </div>
    </div>
    <div class=" col-xs-10 col-sm-6 col-md-8">
        <h4 class="pro-d-title spazioSinistra" >
            <a href="product.php?idP=<?php echo $product['idP'];?>" class="testoProdotto">
                <?php echo $product['name']; ?>
            </a>
            <span id="rimuovi<?php echo $product['idP'];?>" class="rimuovi"><i class="fas fa-trash " ></i></span>
        </h4>

        <div class="spazioSinistra" >
            <strong>Prezzo : </strong>
            <span><?php echo $product['price']/100; $totale += $product['price']*$product['qtaProd']/100;?>&euro;</span>
        </div>
        <form class="form-group spazioSinistra infoProduct" id="<?php echo $product['idP'];?>" >
            <div style="float:left;margin:10px;">Quantità</div>
            <input style="float:left;margin:10px;" type="number" min="1" value="<?php echo $product['qtaProd'];?>" class="form-control quantity aggiorna" id="qta<?php echo $product['idP'];?>">
            <button class="btn btn-round bottoneCarrello" style="float:left;margin:10px;" type="submit" hidden id="button<?php echo $product['idP'];?>" >
                <i class="fa fa-shopping-cart"></i> aggiorna il Carrello
            </button>
        </form>
        <br><br>
        <div  class="testoErrore rimuovi" hidden id="avvisoerrore<?php echo $product['idP'];?>" style="margin-left:175px; padding-top:5px;">  <i class="fas fa-exclamation-circle"></i> Prodotto non presente in magazzino</div>
    </div>
</div>